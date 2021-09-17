<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->foreign('paciente_id', 'fk_solicitudes_pacientes1')->references('id')->on('pacientes');
            $table->foreign('estado_id', 'fk_solicitudes_estados1')->references('id')->on('solicitud_estados');
            $table->foreign('user_crea', 'fk_solicitudes_users1')->references('id')->on('users');
            $table->foreign('user_actualiza', 'fk_solicitudes_users2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->dropForeign('fk_solicitudes_pacientes1');
            $table->dropForeign('fk_solicitudes_estados1');
            $table->dropForeign('fk_solicitudes_users1');
            $table->dropForeign('fk_solicitudes_users2');
        });
    }
}
