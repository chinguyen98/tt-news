<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin', function (Blueprint $table) {
            $table->increments('Id_tin');
            $table->string('Tieude', 255);
            $table->string('Hinhdaidien', 100);
            $table->string('Mota', 255);
            $table->text('Noidung');
            $table->date('Ngaydangtin');
            $table->string('Tacgia', 50);
            $table->integer('Solanxem');
            $table->boolean('Tinhot');
            $table->boolean('Trangthai');
            $table->integer('Id_loaitin')->unsigned();
            $table->foreign('Id_loaitin')->references('Id_loaitin')->on('loaitin')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tin');
    }
}
