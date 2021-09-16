<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormasFarmaceuticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formas_farmaceuticas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique('nombre_UNIQUE');
            $table->unsignedBigInteger('tipo_id')->nullable()->index('fk_formas_farmaceuticas_forma_farmaceutica_tipo1_idx');
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
        Schema::dropIfExists('formas_farmaceuticas');
    }
}
