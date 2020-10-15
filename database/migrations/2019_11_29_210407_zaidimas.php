<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Zaidimas extends Migration
{
    public $tableName = 'zaidimas';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('zaidimo_kodas')->primary();
            $table->string('pavadinimas',255)->nullable();
            $table->date('isleidimo_data');
            $table->string('aprasymas',255)->nullable();



            $table->integer('fk_Kurejasimones_kodas');

            $table->index(["fk_Kurejasimones_kodas"]);

            $table->foreign('fk_Kurejasimones_kodas')
                ->references('imones_kodas')
                ->on('kurejas')
                ->onDelete('no action')
                ->onUpdate('no action');


            $table->unsignedInteger('zanras');


            $table->foreign('zanras')
                ->references('id_Zanras')
                ->on('zanras')
                ->onDelete('no action')
                ->onUpdate('no action');
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
