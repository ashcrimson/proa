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
            $table->foreign('laboratorio_id', 'fk_medicamentos_laboratorios1')->references('id')->on('medicamento_laboratorios');
            $table->foreign('via_admin', 'fk_medicamentos_medicamento_clasificaciones1')->references('id')->on('medicamento_vias_admin');
            $table->foreign('forma_id', 'fk_medicamentos_medicamento_presentaciones1')->references('id')->on('formas_farmaceuticas');
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
            $table->dropForeign('fk_medicamentos_laboratorios1');
            $table->dropForeign('fk_medicamentos_medicamento_clasificaciones1');
            $table->dropForeign('fk_medicamentos_medicamento_presentaciones1');
        });
    }
}
