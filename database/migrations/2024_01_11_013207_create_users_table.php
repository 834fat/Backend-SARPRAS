<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
   public function up()
   {
       Schema::create('users', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('name')->nullable();
           $table->string('email')->unique();
           $table->string('password');
           $table->enum('role', ['admin', 'user']);
           $table->timestamps();
       });
   }

   public function down()
   {
       Schema::dropIfExists('users');
   }
}
