<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaHasMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_has_categoria', function (Blueprint $table) {
            $table->unsignedBigInteger('medicamento_id')->index('fk_farmaco_medicamento_has_categorias_medicamentos1_idx');
            $table->unsignedBigInteger('categoria_id')->index('fk_farmaco_medicamento_has_categorias_farmaco_categoria1_idx');
            $table->primary(['categoria_id', 'medicamento_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamento_has_categoria');
    }
}
