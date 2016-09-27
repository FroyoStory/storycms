<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('role')->default('member');
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->string('twitter_profile')->nullable();
            $table->string('bio')->nullable();
            $table->string('accessibility')->nullable();
            $table->string('status')->default('active');
            $table->string('language', 2)->default('en');
            $table->string('visibility')->default('public');
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('confirm_token', 32);
            $table->timestamp('confirm_at')->nullable();
            $table->rememberToken();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
