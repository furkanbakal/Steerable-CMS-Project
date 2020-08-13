<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->timeStamps();
            $table->string('settings_description');
            $table->string('settings_key');
            $table->text('settings_value');
            $table->string('settings_type');
            $table->integer('settings_must');
            $table->enum('settings_delete',['0','1']);
            $table->enum('settings_status',['0','1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
