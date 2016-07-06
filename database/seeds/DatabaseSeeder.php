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
        factory(App\Author::class, 20)->create()->each(function($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });

        factory(App\Book::class, 50)->create()->each(function($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });
        
    }
}
