<?php

namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

//        User::create(array('firstname' => 'Angelin', 'lastname' => 'Nadar', 'email' => 'angelin.nadar@wipro.com',
//                            'password' => 'password'));
        factory(App\Book::class, 50)->create();

    }

}

