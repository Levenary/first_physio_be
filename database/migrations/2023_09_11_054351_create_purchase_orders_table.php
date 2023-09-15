<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->string('product_price');
            $table->string('product_name');
            $table->string('product_category');
            $table->bigInteger('promo_price')->nullable();
            $table->timestamp('expiration_date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('branch_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}
