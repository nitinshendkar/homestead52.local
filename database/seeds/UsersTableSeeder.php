<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        factory(App\Book::class, 50)->create();

    }

}

