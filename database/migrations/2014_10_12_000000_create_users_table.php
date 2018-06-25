<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    protected $connection = 'mongodb';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->table('users', function (Blueprint $collection) {
            $collection->string('name');
            $collection->unique('email');
            $collection->string('password',200);
            $collection->string('user_type');
            $collection->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::connection($this->connection)->table('users', function (Blueprint $collection)
            {
                $collection->drop();
            });
        //Schema::dropIfExists('users');
    }
}
