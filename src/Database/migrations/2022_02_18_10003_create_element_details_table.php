<?php

use \Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateElementDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('element_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sitemap_id')->unsigned()->index()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->enum('status', ['0', '1', '9'])->default('1');
            $table->foreignId('language_id')->unsigned()->index()->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('element_details');
    }
}
