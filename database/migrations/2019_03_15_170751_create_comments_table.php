<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('blog_id')
                  ->unsigned();
            $table->unsignedInteger('user_id')
                  ->unsigned();
            $table->longText('comment');
            $table->timestamps();
        });
        Schema::table('comments', function (Blueprint $table){
            $table->foreign('blog_id')
                   ->references('id')
                   ->on('blogposts')
                   ->onDelete('cascade');
            $table->foreign('user_id')
                   ->references('id')
                   ->on('users')
                   ->onDelete('cascade');

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
