<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_medicamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('solicitud_id')->index('fk_solicitud_medicamentos_solicitudes1_idx');
            $table->unsignedBigInteger('medicamento_id')->index('fk_solicitud_medicamentos_medicamentos1_idx');
            $table->string('dosis');
            $table->string('frecuencia')->nullable();
            $table->string('periodo')->nullable();
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
        Schema::dropIfExists('solicitud_medicamentos');
    }
}
