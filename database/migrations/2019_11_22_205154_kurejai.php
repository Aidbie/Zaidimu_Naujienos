<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kurejai extends Migration
{
    public $tableName = 'kurejas';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('imones_kodas')->primary();
            $table->string('pavadinimas',30)->nullable();
            $table->date('ikurimo_data')->nullable();
            $table->string('aprasymas',255)->nullable();




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
