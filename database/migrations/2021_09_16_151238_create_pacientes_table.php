<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('run')->unique();
            $table->string('dv_run');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->date('fecha_nac');
            $table->string('sexo');
            $table->string('sigla_grado')->nullable();
            $table->string('unid_rep_dot')->nullable();
            $table->integer('cond_alta_dot')->nullable();
            $table->string('direccion')->nullable();
            $table->string('familiar_responsable')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono2')->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
