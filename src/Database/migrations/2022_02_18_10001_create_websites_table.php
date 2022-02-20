<?php

use \Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateWebsitesTable extends Migration
{
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domain');
            $table->enum('status', ['0', '1'])->default('1');
            $table->boolean('default')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
