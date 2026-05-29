<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentStatusEnum;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Illuminate\Support\Facades\DB;
use ZarinPal\Sdk\ClientBuilder;
use ZarinPal\Sdk\Endpoint\PaymentGateway\PaymentGateway;
use ZarinPal\Sdk\Endpoint\PaymentGateway\RequestTypes\RequestRequest;
use ZarinPal\Sdk\Endpoint\PaymentGateway\RequestTypes\VerifyRequest;
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

        $paymentGateway = self::getPaymentGateway();

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

    /**
     * @return PaymentGateway
     */
    private static function getPaymentGateway(): PaymentGateway
    {
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
        return $paymentGateway;
    }

    /**
     * @param Payment $payment
     * @return Payment
     */
    public static function verify(Payment $payment): Payment
    {
        $paymentGateway = self::getPaymentGateway();

        $verifyRequest = new VerifyRequest();
        $verifyRequest->authority = $payment->authority;
        $verifyRequest->amount = $payment->amount;

        $response = $paymentGateway->verify($verifyRequest);

        $payment = DB::transaction(function () use ($response, $payment) {
            if ($response->code === 100 || $response->code === 101) {
                $payment->update([
                    'status' => PaymentStatusEnum::SUCCESS,
                    'ref_id' => $response->ref_id,
                    'status_code' => $response->code,
                ]);
                $payment->order()->update([
                    'status' => OrderStatusEnum::PAYMENT_SUCCESS
                ]);
            } else {
                $payment->update([
                    'status' => PaymentStatusEnum::FAIL,
                    'status_code' => $response->code,
                ]);
                $payment->order()->update([
                    'status' => OrderStatusEnum::PAYMENT_FAIL
                ]);
            }
            return $payment;
        });

        return $payment;
    }
}
