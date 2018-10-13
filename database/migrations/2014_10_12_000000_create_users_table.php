<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
           
            $table->string('name')->nullable();
            $table->string('role')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
         DB::table('users')->insert([
            [
                'name' => 'febriani',
                'role' => 'admin',
                'email' => 'febriani@gmail.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'ayu',
                'role' => 'petugasbumdes',
                'email' => 'ayu@gmail.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'wulantika',
                'role' => 'petugastoko',
                'email' => 'wulantika@gmail.com',
                'password' => bcrypt('123456')
            ],
          
        ]);
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
