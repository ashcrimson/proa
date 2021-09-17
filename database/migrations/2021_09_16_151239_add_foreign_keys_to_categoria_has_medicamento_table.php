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
        Schema::table('medicamento_has_categoria', function (Blueprint $table) {
            $table->foreign('categoria_id', 'fk_medicamento_has_categorias1')->references('id')->on('farmaco_categorias');
            $table->foreign('medicamento_id', 'fk_medicamento_has_categorias2')->references('id')->on('medicamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicamento_has_categoria', function (Blueprint $table) {
            $table->dropForeign('fk_medicamento_has_categorias1');
            $table->dropForeign('fk_medicamento_has_categorias2');
        });
    }
}
