<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFarmacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('farmacos', function (Blueprint $table) {
            $table->foreign('categoria_id', 'fk_farmacos_farmaco_categoria1')->references('id')->on('farmaco_categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('farmacos', function (Blueprint $table) {
            $table->dropForeign('fk_farmacos_farmaco_categoria1');
        });
    }
}
