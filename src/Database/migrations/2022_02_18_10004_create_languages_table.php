<?php

use \Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 200);
            $table->string('native_name', 250);
        });
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
