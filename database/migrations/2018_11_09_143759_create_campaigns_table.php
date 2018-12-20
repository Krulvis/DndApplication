<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->default('A brand new story!');
            $table->integer('money')->default(0);
            $table->integer('spent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('campaigns');
    }
}
