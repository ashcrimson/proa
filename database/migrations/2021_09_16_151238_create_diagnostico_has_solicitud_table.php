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
            $table->unsignedBigInteger('diagnostico_id')->index('fk_diagnostico_solicitude_idx1');
            $table->unsignedBigInteger('solicitud_id')->index('fk_diagnostico_solicitude_idx2');
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
