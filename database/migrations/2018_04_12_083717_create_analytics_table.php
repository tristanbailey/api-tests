<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateanalyticsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email');
            $table->string('account_id');
            $table->string('property_id');
            $table->string('profile_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('analytics');
    }
}
