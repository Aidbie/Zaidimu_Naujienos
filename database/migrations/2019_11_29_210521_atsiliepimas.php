<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Atsiliepimas extends Migration
{
    public $tableName = 'atsiliepimas';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id',11)->unique();
            $table->string('pavadinimas',255)->nullable();
            $table->string('turinys',255)->nullable();
            $table->date('paskelbimo_data')->nullable();
            $table->decimal('vertinimas', 5.2)->nullable();

            $table->integer('fk_Zaidimaszaidimo_kodas');

            $table->index(["fk_Zaidimaszaidimo_kodas"]);


            $table->foreign('fk_Zaidimaszaidimo_kodas')
                ->references('zaidimo_kodas')->on('zaidimas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->string('fk_VartotojasNaudotojo_vardas',30);

            $table->index(["fk_VartotojasNaudotojo_vardas"]);


            $table->foreign('fk_VartotojasNaudotojo_vardas')
                ->references('naudotojo_vardas')->on('vartotojas')
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
