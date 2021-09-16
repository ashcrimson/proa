<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFormasFarmaceuticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formas_farmaceuticas', function (Blueprint $table) {
            $table->foreign('tipo_id', 'fk_formas_farmaceuticas_forma_farmaceutica_tipo1')->references('id')->on('forma_farmaceutica_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formas_farmaceuticas', function (Blueprint $table) {
            $table->dropForeign('fk_formas_farmaceuticas_forma_farmaceutica_tipo1');
        });
    }
}
