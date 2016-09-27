<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('markdown');
            $table->text('html');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_page')->default(false);
            $table->string('status', 16)->default('draft');
            $table->string('visibility', 16)->default('public');
            $table->string('meta_title', 150)->nullable();
            $table->string('meta_description', 200)->nullable();
            $table->integer('author_id')->unsigned()->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
