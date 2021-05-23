<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImpuestoToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('impuesto_id')->unsigned()->nullable();
            $table->foreign('impuesto_id')->references('id')->on('impuestos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('impuesto_id')->unsigned()->nullable();
            $table->foreign('impuesto_id')->references('id')->on('impuestos')->onDelete('cascade');
        });
    }
}
