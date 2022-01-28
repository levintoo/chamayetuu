<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('user_id');
            $table->string('email')->unique();
            $table->string('phone',100)->unique();
            $table->string('national_id',100)->unique();
            $table->date('dob')->format('Y/m/d');
            $table->string('residence',255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status',14)->default('1')->comment('0 for created 1 for copleted 2 for deleted 3 for banned');
            $table->string('utype',14)->default('USR')->comment('USR for user and ADM for admin and Sec for secretary');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
