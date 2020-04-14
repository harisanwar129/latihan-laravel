<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::drop('krs');
        Schema::create('krs', function (Blueprint $table) {
                       $table->increments('id');
            $table->char('npm',10)->index();
            $table->char('kode_matakuliah',8)->index();
           

            $table->foreign('npm')
            ->references('npm')
            ->on('mahasiswa')
            ->onUpdate('cascade');
            
            $table->foreign('kode_matakuliah')
            ->references('kode_matakuliah')
            ->on('matakuliah')
            ->onUpdate('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('krs');
    }
}
