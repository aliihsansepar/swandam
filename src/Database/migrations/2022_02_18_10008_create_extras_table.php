<?php

use \Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateExtrasTable extends Migration
{
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->index();
            $table->foreignId('model_type')->index();
            $table->string('key');
            $table->text('value');
        });
    }

    public function down()
    {
        Schema::dropIfExists('extras');
    }
}