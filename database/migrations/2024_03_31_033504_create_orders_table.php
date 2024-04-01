<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->double('subtotal',10,2);

            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kodepos');

            $table->enum('status', ['pending', 'delivered', 'inprogress'])->default('pending');
            $table->enum('payment_status', ['paid', 'not paid'])->default('not paid');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};