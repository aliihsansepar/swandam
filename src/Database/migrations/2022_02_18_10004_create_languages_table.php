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
            $table->string('code', 15);
            $table->string('name', 190);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
