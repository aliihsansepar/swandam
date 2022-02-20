<?php

use \Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePostDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('post_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->index()->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('detail');
            $table->foreignId('language_id')->index()->constrained()->cascadeOnDelete();
            $table->string('slug');
            $table->string('status')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_details');
    }
}