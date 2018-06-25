<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        DB::collection('users')->delete();
        DB::collection('users')->insert(['name' => 'John Doe', 'email' => 'raselbubt@gmail.com','password' => bcrypt('123'),'user_type' => '1','created_at'=>$time,'updated_at'=>$time]);
    }
}
