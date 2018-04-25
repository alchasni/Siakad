<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbilKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambilkelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nrp', 10);
            $table->string('kodekelas', 10);
            $table->integer('uts')->unsigned();
            $table->integer('uas')->unsigned();
            $table->timestamps();
        });
        Schema::table('ambilkelas', function($table){
            $table->foreign('nrp')
                    ->references('nrp')
                    ->on('mhs')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('kodekelas')
                    ->references('kodekelas')
                    ->on('kelas')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ambilkelas');
    }
}
