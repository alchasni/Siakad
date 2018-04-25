<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('kodekelas', 10);
            $table->primary('kodekelas');
            $table->string('kodematkul',10)->index();
            $table->string('nip', 10)->index();
            $table->timestamps();
        });
        Schema::table('kelas', function($table){
            $table->foreign('kodematkul')
                    ->references('kodematkul')
                    ->on('matkuls')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('nip')
                    ->references('nip')
                    ->on('dosens')
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
        Schema::dropIfExists('kelas');
    }
}
