<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserShortcutsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shortcuts', function(Blueprint $table)
        {
            $table->bigInteger('option_id')->unsigned()->index('fk_options_users_idx1');
            $table->bigInteger('user_id')->unsigned()->index('fk_options_users_idx2');
            $table->string('color')->nullable();
            $table->integer('orden')->nullable();
            $table->primary(['option_id','user_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_shortcuts');
    }

}
