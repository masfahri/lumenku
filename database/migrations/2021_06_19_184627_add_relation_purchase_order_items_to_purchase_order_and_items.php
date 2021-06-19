<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationPurchaseOrderItemsToPurchaseOrderAndItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_order_items', function (Blueprint $table) {
            $table->foreign('po_id')->references('id')->on('purchase_orders')
                  ->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('item_id')->references('id')->on('items')
                  ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_order_items', function (Blueprint $table) {
            $table->dropForeign('purchase_order_items_po_id_foreign', 'purchase_order_items_item_id_foreign');
        });
    }
}
