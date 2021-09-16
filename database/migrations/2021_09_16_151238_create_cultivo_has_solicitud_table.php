<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCultivoHasSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivo_has_solicitud', function (Blueprint $table) {
            $table->unsignedBigInteger('cultivo_id')->index('fk_cultivos_has_solicitudes_cultivos1_idx');
            $table->unsignedBigInteger('solicitud_id')->index('fk_cultivos_has_solicitudes_solicitudes1_idx');
            $table->string('otro')->nullable();
            $table->primary(['cultivo_id', 'solicitud_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultivo_has_solicitud');
    }
}
