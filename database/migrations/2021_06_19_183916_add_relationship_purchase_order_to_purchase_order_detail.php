<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipPurchaseOrderToPurchaseOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_order_detail', function (Blueprint $table) {
            $table->foreign('po_id')->references('id')->on('purchase_orders')
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
        Schema::table('purchase_order_detail', function (Blueprint $table) {
            $table->dropForeign('purchase_order_detail_po_id_foreign');
        });
    }
}
