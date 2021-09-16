<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentoFarmacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_farmacos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medicamento_id')->index('fk_medicamento_composicion_medicamentos1_idx');
            $table->unsignedBigInteger('farmaco_id')->index('fk_medicamento_composicion_farmacos1_idx');
            $table->unsignedBigInteger('unidad_medida_id')->index('fk_medicamento_composicion_unidad_medida1_idx');
            $table->decimal('cantidad');
            $table->unsignedBigInteger('unidad_medida_divisora')->nullable()->index('fk_medicamento_composicion_unidad_medida2_idx');
            $table->decimal('cantidad_divisora')->nullable();
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
        Schema::dropIfExists('medicamento_farmacos');
    }
}
