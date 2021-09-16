<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('indicaciones', 45)->nullable();
            $table->string('contraindicaciones', 45)->nullable();
            $table->string('advertencias', 45)->nullable();
            $table->string('dosis', 45)->nullable();
            $table->unsignedBigInteger('via_admin')->nullable()->index('fk_medicamentos_medicamento_clasificaciones1_idx');
            $table->unsignedBigInteger('laboratorio_id')->nullable()->index('fk_medicamentos_laboratorios1_idx');
            $table->unsignedBigInteger('forma_id')->nullable()->index('fk_medicamentos_medicamento_presentaciones1_idx');
            $table->tinyInteger('receta')->nullable();
            $table->decimal('cantidad_total')->nullable();
            $table->decimal('cantidad_formula')->nullable();
            $table->string('generico', 45)->nullable();
            $table->string('created_at', 45)->nullable();
            $table->string('updated_at', 45)->nullable();
            $table->string('deleted_at', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamentos');
    }
}
