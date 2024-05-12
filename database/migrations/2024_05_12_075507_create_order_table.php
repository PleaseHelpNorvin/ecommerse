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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            // $table->integer('check_out_id');
            $table->unsignedBigInteger('customer_id');
            // $table->unsignedBigInteger('check_out_id');

            $table->string('fullname');
            $table->string('status')->default('Pending');
            $table->decimal('total', 10, 2);
            $table->string('address');

            $table->string('mop'); // Method of Payment
            $table->timestamps();

            // $table->foreign('check_out_id')->references('id')->on('check_out_history');
            $table->foreign('customer_id')->references('id')->on('client_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
