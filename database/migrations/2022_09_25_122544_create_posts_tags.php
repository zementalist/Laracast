<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->bigInteger("post_id", false, true);
            $table->tinyInteger("tag_id", false, true)->nullable();


            $table->foreign("post_id")->references("id")->on("posts")->onDelete("CASCADE");
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("SET NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tags');
    }
};
