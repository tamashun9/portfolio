<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('body');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('game_id')->unsigned();    //unsigned()型で定義
            //'game_id' は 'gameテーブル' の 'id' を参照する外部キー
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
        Schema::dropIfExists('comments');
    }
}
