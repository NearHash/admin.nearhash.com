<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->unique();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('country_code');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->boolean('hide_show')->default(0);
            $table->boolean('is_deactivate')->default(0);
            $table->boolean('is_banned')->default(0);
            $table->boolean('role')->default(0); // 0 is user || agent etc ....
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('app_users');
    }
}
