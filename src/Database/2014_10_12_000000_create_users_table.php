<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use larvelcode\panel\functions\helperfunction;

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
            $table->tinyInteger('permission');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('career');
            $table->longText('information')->nullable();
            $table->timestamp('online')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
        array(

        'name'            => 'Admin',
        'permission'      => '1',
        'slug'            => helperfunction::slug('Ahmed Saad'),
        'email'           => 'admin@domain.com',
        'password'        => '$2y$10$XrJfb0ZP9XBZYPtXFENbbOY1rIx0mWNV2ObDpzUe2sAwF22GUrzca',
        'career'          => 'Web Developer',
        'information'     => 'My Name Is Ahmed saad',
        'online'          => date('Y-m-d h-i-s'),
        'created_at'      => date('Y-m-d h-i-s'), 
        'updated_at'      => date('Y-m-d h-i-s')
        ));
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
