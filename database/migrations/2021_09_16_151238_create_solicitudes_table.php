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
            $table->text('terapia_empirica')->nullable();
            $table->text('terapia_especifica')->nullable();
            $table->tinyInteger('infeccion_extrahospitalaria')->nullable();
            $table->tinyInteger('infeccion_intrahospitalaria')->nullable();
            $table->tinyInteger('disfuncion_renal')->nullable();
            $table->tinyInteger('disfuncion_hepatica')->nullable();
            $table->decimal('creatinina')->nullable();
            $table->decimal('peso')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('user_crea')->index('fk_solicitud_users1_idx');
            $table->unsignedBigInteger('user_actualiza')->nullable()->index('fk_solicitud_users2_idx');
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
