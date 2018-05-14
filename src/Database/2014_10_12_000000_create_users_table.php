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

        'name'            => 'Ahmed Saad',
        'permission'      => '1',
        'slug'            => str_slug('Ahmed Saad'),
        'email'           => 'ahmed@4serv.net',
        'password'        => '$2y$10$hqeUq/klkoP1rehWy18D5.TiulMt7L3iBZ28dACGIc2J3ivSq6JkS',
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
