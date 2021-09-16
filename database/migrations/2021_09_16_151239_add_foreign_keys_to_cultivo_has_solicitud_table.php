<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCultivoHasSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cultivo_has_solicitud', function (Blueprint $table) {
            $table->foreign('cultivo_id', 'fk_cultivos_has_solicitudes_cultivos1')->references('id')->on('cultivos');
            $table->foreign('solicitud_id', 'fk_cultivos_has_solicitudes_solicitudes1')->references('id')->on('solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cultivo_has_solicitud', function (Blueprint $table) {
            $table->dropForeign('fk_cultivos_has_solicitudes_cultivos1');
            $table->dropForeign('fk_cultivos_has_solicitudes_solicitudes1');
        });
    }
}
