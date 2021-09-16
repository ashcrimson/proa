<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmacos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique('nombre_UNIQUE');
            $table->unsignedBigInteger('categoria_id')->index('fk_farmacos_farmaco_categoria1_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmacos');
    }
}
