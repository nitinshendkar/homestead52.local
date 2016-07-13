<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class authorTest extends TestCase
{
    private function __create_user(){

        return factory(App\User::class)->create();
    }
    /**
     * @test
     */
    public function it_displays_all_authors()
    {

        $user = $this->__create_user();
        $response = $this->actingAs($user)->call('GET', '/authors');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @test
     */
    public function it_creates_a_new_author() {

        $user = $this->__create_user();
        $this->actingAs($user)
             ->visit('authors/create')
             ->type('authortest1', 'author_name')
             ->press('Save')
             ->seePageIs('/authors');
    }

    /**
     * @test
     */
    public function it_does_not_create_author_without_valid_info()
    {

        $user = $this->__create_user();
        $this->actingAs($user)
            ->visit('authors/create')
            ->press('Save')
            ->see('The name field is required.');
    }

    /**
     * @test
     */
    public function it_deletes_a_author() {

        $user = $this->__create_user();
        $this->actingAs($user)
            ->visit('authors/destroy/4')
            ->press('Delete')
            ->seePageIs('/authors');
    }

}
