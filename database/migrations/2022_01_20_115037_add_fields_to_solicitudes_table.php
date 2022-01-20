<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->string('ingreso')->nullable();
            $table->string('inghosp')->nullable();
            $table->string('nrocama')->nullable();
            $table->string('codubic')->nullable();
            $table->string('nropiso')->nullable();
            $table->string('nropieza')->nullable();
            $table->string('tipocama')->nullable();
            $table->string('codserv')->nullable();
            $table->string('codinst')->nullable();
            $table->string('descinst')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->dropColumn('ingreso');
            $table->dropColumn('inghosp');
            $table->dropColumn('nrocama');
            $table->dropColumn('codubic');
            $table->dropColumn('nropiso');
            $table->dropColumn('nropieza');
            $table->dropColumn('tipocama');
            $table->dropColumn('codserv');
            $table->dropColumn('codinst');
            $table->dropColumn('descinst');
        });
    }
}
