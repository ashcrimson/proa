<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMedicamentoFarmacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicamento_farmacos', function (Blueprint $table) {
            $table->foreign('farmaco_id', 'fk_medicamento_farmacos1')->references('id')->on('farmacos');
            $table->foreign('medicamento_id', 'fk_medicamento_farmacos2')->references('id')->on('medicamentos');
            $table->foreign('unidad_medida_id', 'fk_medicamento_farmacos3')->references('id')->on('unidad_medida');
            $table->foreign('unidad_medida_divisora', 'fk_medicamento_farmacos4')->references('id')->on('unidad_medida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicamento_farmacos', function (Blueprint $table) {
            $table->dropForeign('fk_medicamento_farmacos1');
            $table->dropForeign('fk_medicamento_farmacos2');
            $table->dropForeign('fk_medicamento_farmacos3');
            $table->dropForeign('fk_medicamento_farmacos4');
        });
    }
}
