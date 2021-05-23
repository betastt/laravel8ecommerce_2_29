<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPresentacionproductoToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('presentacionproducto_id')->unsigned()->nullable();
            $table->foreign('presentacionproducto_id')->references('id')->on('presentacion_productos')->onDelete('cascade');
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
            $table->bigInteger('presentacionproducto_id')->unsigned()->nullable();
            $table->foreign('presentacionproducto_id')->references('id')->on('presentacion_productos')->onDelete('cascade');
        });
    }
}
