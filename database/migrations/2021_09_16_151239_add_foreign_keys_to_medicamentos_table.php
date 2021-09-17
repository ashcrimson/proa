<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicamentos', function (Blueprint $table) {
            $table->foreign('laboratorio_id', 'fk_medicamentos1')->references('id')->on('medicamento_laboratorios');
            $table->foreign('via_admin', 'fk_medicamentos2')->references('id')->on('medicamento_vias_admin');
            $table->foreign('forma_id', 'fk_medicamentos3')->references('id')->on('formas_farmaceuticas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicamentos', function (Blueprint $table) {
            $table->dropForeign('fk_medicamentos1');
            $table->dropForeign('fk_medicamentos2');
            $table->dropForeign('fk_medicamentos3');
        });
    }
}
