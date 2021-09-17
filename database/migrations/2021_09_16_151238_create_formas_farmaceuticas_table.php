<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormasFarmaceuticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formas_farmaceuticas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->unsignedBigInteger('tipo_id')->nullable()->index('fk_forma_farm_tipo1_idx');
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
        Schema::dropIfExists('formas_farmaceuticas');
    }
}
