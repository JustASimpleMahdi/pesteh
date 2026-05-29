<?php

use App\Enums\PaymentStatusEnum;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->string('merchant_id');
            $table->string('authority')->unique();
            $table->unsignedBigInteger('amount');
            $table->string('currency')->default('IRR');
            $table->string('description', 500);
            $table->string('status')->default(PaymentStatusEnum::PENDING->value);
            $table->integer('status_code')->nullable();
            $table->integer('ref_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
