<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body')->default('');
            $table->string('name')->default('nameless item');
            $table->string('weight')->default('');
            $table->string('price')->default('');
            $table->string('source')->default('');
            $table->string('type')->default('');
            $table->string('misc')->default('');
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
        Schema::dropIfExists('parses');
    }
}
