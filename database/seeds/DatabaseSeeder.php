<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $this->call(AuthorTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(UsersTableSeeder::class);

    }
}
