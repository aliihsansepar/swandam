<?php

use \Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('post_id')->index()->constrained()->cascadeOnDelete();
            $table->date("date")->nullable();
            $table->string('status')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}