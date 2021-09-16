<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticoHasSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico_has_solicitud', function (Blueprint $table) {
            $table->unsignedBigInteger('diagnostico_id')->index('fk_diagnosticos_has_solicitudes_diagnosticos1_idx');
            $table->unsignedBigInteger('solicitud_id')->index('fk_diagnosticos_has_solicitudes_solicitudes1_idx');
            $table->text('otro')->nullable();
            $table->primary(['diagnostico_id', 'solicitud_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostico_has_solicitud');
    }
}
