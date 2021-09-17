<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSolicitudMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitud_medicamentos', function (Blueprint $table) {
            $table->foreign('medicamento_id', 'fk_solicitud_medicamentos1')->references('id')->on('medicamentos');
            $table->foreign('solicitud_id', 'fk_solicitud_medicamentos2')->references('id')->on('solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitud_medicamentos', function (Blueprint $table) {
            $table->dropForeign('fk_solicitud_medicamentos1');
            $table->dropForeign('fk_solicitud_medicamentos2');
        });
    }
}
