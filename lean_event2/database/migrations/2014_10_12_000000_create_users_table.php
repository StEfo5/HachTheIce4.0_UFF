<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('team')->nullable();
            $table->string('track_id')->nullable();
            $table->string('region')->nullable();
            $table->integer('ceo_score')->default(0);
            $table->integer('cdo_score')->default(0);
            $table->integer('cto_score')->default(0);
            $table->string('ceo_id')->nullable();
            $table->string('cto_id')->nullable();
            $table->string('cdo_id')->nullable();
            $table->integer('role')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
