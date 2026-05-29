<?php

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
        Schema::create('order_receivers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('province');
            $table->string('city');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_receivers');
    }
};
