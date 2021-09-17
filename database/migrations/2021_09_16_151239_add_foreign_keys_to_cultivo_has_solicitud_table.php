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
            $table->foreign('cultivo_id', 'fk_cultivo_solicitud1')->references('id')->on('cultivos');
            $table->foreign('solicitud_id', 'fk_cultivo_solicitud2')->references('id')->on('solicitudes');
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
            $table->dropForeign('fk_cultivo_solicitud1');
            $table->dropForeign('fk_cultivo_solicitud2');
        });
    }
}
