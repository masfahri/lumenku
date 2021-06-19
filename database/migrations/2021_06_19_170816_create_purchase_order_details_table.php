<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('po_id');
            $table->float('ppn')->default(0.0);
            $table->float('pph')->default(0.0);
            $table->string('other_tax')->default('{}');
            $table->string('currency')->default('IDR');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_details');
    }
}
