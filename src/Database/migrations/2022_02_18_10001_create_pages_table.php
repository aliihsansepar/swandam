<?php

use \Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('builder_id')->index()->constrained()->cascadeOnDelete();
            $table->date("date")->nullable();
            $table->string('status')->unsigned()->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}