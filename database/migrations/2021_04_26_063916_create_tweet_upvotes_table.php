<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetUpvotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweet_upvotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tweet_id");
            $table->smallInteger("upvote");
            $table->timestamps();

            $table->foreign("tweet_id")->references("id")->on("tweets")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweet_upvotes');
    }
}
