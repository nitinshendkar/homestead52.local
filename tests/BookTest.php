<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    private function __create_user(){

        return factory(App\User::class)->create();
    }
    /**
     * @test
     */
    public function it_displays_all_books()
    {

        $user = $this->__create_user();
        $response = $this->actingAs($user)->call('GET', '/books');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @test
     */
    public function it_creates_a_new_book() {

        $user = $this->__create_user();
        $this->actingAs($user)
             ->visit('books/create')
             ->type('Booktest1', 'title')
             ->type('1', 'author_id')
             ->type('Description Test', 'description')
             ->press('Save')
             ->seePageIs('/books');
    }

    /**
     * @test
     */
    public function it_does_not_create_book_without_valid_info()
    {

        $user = $this->__create_user();
        $this->actingAs($user)
            ->visit('books/create')
            ->type('1', 'author_id')
            ->type('Description Test', 'description')
            ->press('Save')
            ->see('The title field is required.');
    }

    /**
     * @test
     */
    public function it_deletes_a_book() {

        $user = $this->__create_user();
        $this->actingAs($user)
            ->visit('books/destroy/4')
            ->press('Delete')
            ->seePageIs('/books');
    }

}
