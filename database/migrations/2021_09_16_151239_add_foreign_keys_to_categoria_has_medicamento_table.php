<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCategoriaHasMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria_has_medicamento', function (Blueprint $table) {
            $table->foreign('categoria_id', 'fk_farmaco_categoria_has_medicamentos_farmaco_categoria1')->references('id')->on('farmaco_categorias');
            $table->foreign('medicamento_id', 'fk_farmaco_categoria_has_medicamentos_medicamentos1')->references('id')->on('medicamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria_has_medicamento', function (Blueprint $table) {
            $table->dropForeign('fk_farmaco_categoria_has_medicamentos_farmaco_categoria1');
            $table->dropForeign('fk_farmaco_categoria_has_medicamentos_medicamentos1');
        });
    }
}
