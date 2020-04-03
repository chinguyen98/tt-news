<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->increments('Id_binhluan');
            $table->string('Email', 100);
            $table->dateTime('Thoigian');
            $table->text('Noidung');
            $table->boolean('Trangthai');
            $table->integer('Id_tin')->unsigned();
            $table->foreign('Id_tin')->references('Id_tin')->on('tin')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
