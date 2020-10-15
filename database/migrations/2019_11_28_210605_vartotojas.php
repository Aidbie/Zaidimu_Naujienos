<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vartotojas extends Migration
{
    public $tableName = 'vartotojas';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


     Schema::create($this->tableName, function (Blueprint $table) {
         $table->engine = 'InnoDB';
         $table->string('username',30)->primary()->unique();
         $table->string('email',30);
         $table->string('password',60);
         $table->date('uzsiregistravimo_data')->nullable();


     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
