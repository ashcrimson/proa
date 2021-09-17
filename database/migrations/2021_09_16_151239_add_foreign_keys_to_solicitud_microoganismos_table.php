<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSolicitudMicrooganismosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitud_microorganismos', function (Blueprint $table) {
            $table->foreign('microorganismo_id', 'fk_solicitud_microorganismos1')->references('id')->on('microorganismos');
            $table->foreign('solicitud_id', 'fk_solicitud_microorganismos2')->references('id')->on('solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitud_microorganismos', function (Blueprint $table) {
            $table->dropForeign('fk_solicitud_microorganismos1');
            $table->dropForeign('fk_solicitud_microorganismos2');
        });
    }
}
