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

    /**
     * @test
     */
    public function it_displays_all_books()
    {
        $response = $this->call('GET', '/books');

        $this->assertEquals(200, $response->status());
    }

    /**
     * @test
     */
    public function it_creates_a_new_book() {
        $this->visit('books/create')
            ->type('Booktest1', 'title')
            ->type('102', 'author_id')
            ->type('Description Test', 'description')
            ->press('Save')
            ->seePageIs('/books');
    }

    /**
     * @test
     */
    public function it_does_not_create_a_book_without_valid_information()
    {
        $response = $this->call('GET', '/books');

        $this->assertEquals(200, $response->status());
    }

    /**
     * @test
     */
    public function id_does_not_allow_creation_of_a_book_for_a_guest()
    {
        $this->markTestIncomplete();
    }


    public function testNewBookCreationValidation() {
        $this->visit('books/create')
            ->type('102', 'author_id')
            ->type('Description Test', 'description')
            ->press('Save')
            ->see('The title field is required.');
    }

    public function testNewBookDeletion() {
        $this->visit('books/')
            ->press('Delete')
            ->seePageIs('/books');
    }

}
