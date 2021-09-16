<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDiagnosticoHasSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diagnostico_has_solicitud', function (Blueprint $table) {
            $table->foreign('diagnostico_id', 'fk_diagnosticos_has_solicitudes_diagnosticos1')->references('id')->on('diagnosticos');
            $table->foreign('solicitud_id', 'fk_diagnosticos_has_solicitudes_solicitudes1')->references('id')->on('solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diagnostico_has_solicitud', function (Blueprint $table) {
            $table->dropForeign('fk_diagnosticos_has_solicitudes_diagnosticos1');
            $table->dropForeign('fk_diagnosticos_has_solicitudes_solicitudes1');
        });
    }
}
