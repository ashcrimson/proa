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
        Schema::create('categoria_has_medicamento', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->index('fk_farmaco_categoria_has_medicamentos_farmaco_categoria1_idx');
            $table->unsignedBigInteger('medicamento_id')->index('fk_farmaco_categoria_has_medicamentos_medicamentos1_idx');
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
        Schema::dropIfExists('categoria_has_medicamento');
    }
}
