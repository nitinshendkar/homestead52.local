<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function it_check_wether_index_page_is_exist_or_not()
    {
        $response = $this->call('GET', '/books');

        $this->assertEquals(200, $response->status());
    }

    public function testNewBookCreation() {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('books/create')
             ->type('Booktest1', 'title')
             ->type('1', 'author_id')
             ->type('Description Test', 'description')
             ->press('Save')
             ->seePageIs('/books');
    }
//
    public function testNewBookCreationValidation() {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->visit('books/create')
            ->type('102', 'author_id')
            ->type('Description Test', 'description')
            ->press('Save')
            ->see('The title field is required.');
    }

    public function testNewBookDeletion() {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('books/destroy/1')
            ->press('Delete')
            ->seePageIs('/books');
    }

}
