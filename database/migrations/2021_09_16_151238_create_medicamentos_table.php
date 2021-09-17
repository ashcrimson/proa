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
            $table->id();
            $table->string('nombre');
            $table->text('indicaciones')->nullable();
            $table->text('contraindicaciones')->nullable();
            $table->text('advertencias')->nullable();
            $table->text('dosis')->nullable();
            $table->unsignedBigInteger('via_admin')->nullable()->index('fk_medicamentos_via_idx');
            $table->unsignedBigInteger('laboratorio_id')->nullable()->index('fk_medicamento_laboratorio_idx');
            $table->unsignedBigInteger('forma_id')->nullable()->index('fk_medicamentos_forma1_idx');
            $table->tinyInteger('receta')->nullable();
            $table->decimal('cantidad_total')->nullable();
            $table->decimal('cantidad_formula')->nullable();
            $table->boolean('generico')->nullable();
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
        Schema::dropIfExists('medicamentos');
    }
}
