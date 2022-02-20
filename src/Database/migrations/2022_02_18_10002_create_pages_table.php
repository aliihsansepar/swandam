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
            $table->foreignId('website_id')->index()->constrained()->onDelete('cascade');
            $table->enum('type', ['static', 'dynamic'])->default('static');
            $table->enum('status', ['0', '1'])->default('1');
            $table->boolean("detail_page")->default(false);
            $table->boolean("category")->default(false);
            $table->boolean("criteria")->default(false);
            $table->boolean("property")->default(false);
            $table->boolean("searchable")->default(false);
            $table->boolean("display")->default(false);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
