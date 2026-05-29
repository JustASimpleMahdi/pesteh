<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use ZarinPal\Sdk\ClientBuilder;
use ZarinPal\Sdk\Endpoint\PaymentGateway\RequestTypes\RequestRequest;
use ZarinPal\Sdk\HttpClient\Exception\ResponseException;
use ZarinPal\Sdk\Options;
use ZarinPal\Sdk\ZarinPal;

class PaymentService
{

    /**
     * @param Order $order
     * @param string $callbackUrl
     * @return string
     * @throws ResponseException
     */
    public static function requestPayment(Order $order, string $callbackUrl)
    {
        $description = $order->items->map(fn(OrderItem $item) => "{$item->amount} کیلو {$item->product->name}")->join(', ');
        $mobile = $order->receiver->phone;

        $clientBuilder = new ClientBuilder();
        $clientBuilder->addPlugin(new HeaderDefaultsPlugin([
            'Accept' => 'application/json',
        ]));

        $options = new Options([
            'client_builder' => $clientBuilder,
            'sandbox' => config('gateway.sandbox'), // Enable sandbox mode
            'merchant_id' => config('gateway.merchant_id'),
        ]);

        $zarinpal = new ZarinPal($options);
        $paymentGateway = $zarinpal->paymentGateway();

        $request = new RequestRequest();
        $request->amount = $order->total_price * 10; //Minimum amount 10000 IRR
        $request->description = $description;
        $request->callback_url = $callbackUrl;
        if ($mobile)
            $request->mobile = $mobile; // Optional

        $response = $paymentGateway->request($request);

        $url = $paymentGateway->getRedirectUrl($response->authority); // create full url Payment

        $order->payment()->create([
            'authority' => $response->authority,
            'merchant_id' => $request->merchantId,
            'amount' => $request->amount,
            'currency' => 'IRR',
            'description' => $request->description,
        ]);

        return $url;
    }
}
