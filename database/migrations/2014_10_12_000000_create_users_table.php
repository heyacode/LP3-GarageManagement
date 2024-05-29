<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up():void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('phone');
            $table->string('role');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('users');
    }
}
