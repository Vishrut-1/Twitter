<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikeToLikeDislike extends Migration
{

    public function up()
    {
        Schema::table('like_dislike', function (Blueprint $table) {

            $table->boolean('like');

        });
    }


    public function down()
    {
        Schema::table('like_dislike', function (Blueprint $table) {

            $table->dropColumn('like');

        });
    }
}
