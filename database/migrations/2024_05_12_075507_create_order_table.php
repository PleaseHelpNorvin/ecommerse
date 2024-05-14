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
            $table->unsignedBigInteger('customer_id');
            $table->string('fullname');

            // $table->json('check_out_ids'); // Store array of check_out_ids as JSON
            // $table->json('check_out_product_id'); // Store array of check_out_product_id as JSON
            $table->string('order_number');
            $table->integer('order_quantity_by_product');
            // $table->unsignedBigInteger('order_product_id');
            $table->string('order_product_id');
            $table->string('status')->default('Pending');
            $table->decimal('total', 10, 2);
            $table->string('address');
            $table->string('mop'); // Method of Payment
            $table->timestamps();

            // $table->foreign('check_out_product_id')->references('product_id')->on('check_out_history');
            $table->foreign('customer_id')->references('id')->on('client_user');
            // $table->foreign('order_product_id')->references('id')->on('products');

        });
    }
    // ill rollback need to migrate again

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
