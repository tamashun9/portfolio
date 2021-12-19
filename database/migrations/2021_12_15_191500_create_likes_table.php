<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('game_id')->unsigned();   //unsigned()型で定義
            //'category_id' は 'categoriesテーブル' の 'id' を参照する外部キーです
            $table->bigInteger('user_id')->unsigned();    //unsigned()型で定義
            //'user_id' は 'usersテーブル' の 'id' を参照する外部キーです
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
