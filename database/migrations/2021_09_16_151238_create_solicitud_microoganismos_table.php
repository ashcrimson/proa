<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudMicrooganismosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_microorganismos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solicitud_id')->index('fk_solicitud_microorga_idx1');
            $table->unsignedBigInteger('microorganismo_id')->index('fk_solicitud_microorga_idx2');
            $table->string('susceptibilidad');
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
        Schema::dropIfExists('solicitud_microorganismos');
    }
}
