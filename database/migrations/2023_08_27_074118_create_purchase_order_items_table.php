<?php

// database/migrations/xxxx_xx_xx_create_purchase_order_items_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_item_id');
            $table->timestamps();

            // Menambahkan foreign key ke customer_id
            //$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            // Menambahkan foreign key ke product_item_id
            //$table->foreign('product_item_id')->references('id')->on('product_items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_order_items');
    }
}
