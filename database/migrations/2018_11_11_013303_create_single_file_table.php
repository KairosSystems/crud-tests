<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingleFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_file', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('filewithpath', 255)->nullable();
            $table->longText('filecontent')->nullable();
            $table->string('filepath', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('single_file');
    }
}
