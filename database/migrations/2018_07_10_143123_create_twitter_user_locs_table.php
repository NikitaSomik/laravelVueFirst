<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitterUserLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitter_user_locs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('createTweetData', 300);
            $table->string('idTweet', 100);
            $table->longText('text');
            $table->string('userIdTwitter', 100);
            $table->string('userName', 100);
            $table->longText('description');
            $table->string('screenName', 300);
            $table->string('location', 300);
            $table->longText('profileImageUrl');
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
        Schema::dropIfExists('twitter_user_locs');
    }
}
