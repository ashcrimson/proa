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
            $table->id();
            $table->unsignedBigInteger('solicitud_id')->index('fk_solicitud_medicamentos_idx1');
            $table->unsignedBigInteger('medicamento_id')->index('fk_solicitud_medicamentos_idx2');
            $table->decimal('dosis_valor');
            $table->string('dosis_unidad');
            $table->integer('frecuencia_valor')->nullable();
            $table->string('frecuencia_unidad')->nullable();
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
