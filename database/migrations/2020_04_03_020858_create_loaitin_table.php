<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaitinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaitin', function (Blueprint $table) {
            $table->increments('Id_loaitin');
            $table->string('Ten_loaitin', 50)->unique();
            $table->boolean('Trangthai');
            $table->integer('Id_nhomtin')->unsigned();
            $table->foreign('Id_nhomtin')->references('Id_nhomtin')->on('nhomtin')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaitin');
    }
}
