<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->text("content")->unique();
            $table->unsignedBigInteger("resource_id");
            $table->unsignedBigInteger("location_id");
            $table->smallInteger("is_verified");
            $table->dateTime("tweeted_time");
            $table->timestamps();

            $table->foreign("resource_id")->references("id")->on("resources")->onDelete("cascade");
            $table->foreign("location_id")->references("id")->on("locations")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
