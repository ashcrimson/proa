<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->integer('correlativo')->nullable();
            $table->unsignedBigInteger('paciente_id')->nullable()->index('fk_solicitud_paciente_idx');
            $table->unsignedBigInteger('estado_id')->nullable()->index('fk_solicitud_estado_idx');
            $table->tinyInteger('inicio')->nullable();
            $table->tinyInteger('continuacion')->nullable();
            $table->tinyInteger('terapia_empirica')->nullable();
            $table->tinyInteger('terapia_especifica')->nullable();
            $table->tinyInteger('infeccion_extrahospitalaria')->nullable();
            $table->tinyInteger('infeccion_intrahospitalaria')->nullable();
            $table->tinyInteger('disfuncion_renal')->nullable();
            $table->tinyInteger('disfuncion_hepatica')->nullable();
            $table->decimal('creatinina')->nullable();
            $table->decimal('peso')->nullable();
            $table->string('otro_cultivo')->nullable();
            $table->string('otro_diagnostico')->nullable();
            $table->unsignedBigInteger('clon')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('user_crea')->index('fk_solicitud_users1_idx');
            $table->dateTime('fecha_solicita')->nullable();
            $table->unsignedBigInteger('user_autoriza')->nullable()->index('fk_solicitud_users2_idx');
            $table->dateTime('fecha_autoriza')->nullable();
            $table->unsignedBigInteger('user_despacha')->nullable()->index('fk_solicitud_users3_idx');
            $table->dateTime('fecha_despacha')->nullable();
            $table->unsignedBigInteger('user_actualiza')->nullable()->index('fk_solicitud_users4_idx');
            $table->date('fecha_inicio_tratamiento')->nullable();
            $table->date('fecha_fin_tratamiento')->nullable();
            $table->string('descserv')->nullable();
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
        Schema::dropIfExists('solicitudes');
    }
}
