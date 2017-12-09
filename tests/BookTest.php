<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    //@todo mock user with specific criteria & then use it
    public function mockUser()
    {
        $user = factory(App\User::class)->create(
            [
                'name'     => 'Angelin'
            ]
        );
        $this->be($user);
    }

    /**
     * @test
     */
    public function it_displays_all_users()
    {

        $user = factory(App\User::class)->create();
        $response = $this->actingAs($user)
            ->call('GET', '/users');

        $this->assertEquals(200, $response->status());
    }

    /**
     * @test
     */
    public function it_creates_a_new_book()
    {

        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('users/create')
            ->type('Booktest1', 'title')
            ->type('10', 'author_id')
            ->type('Description Test', 'description')
            ->press('Save')
            ->seePageIs('users')
            ->seeInDatabase('users', ['title' => 'Booktest1']);
    }

    /**
     * @test
     */
   public function it_does_not_create_book_without_valid_info()
    {

        $user = factory(App\User::class)->create();
        $this->actingAs($user);
            $response = $this->call('POST','users',['author_id'=>'1','description'=>'Description Test']);
            $this->assertEquals(302, $response->status());
    }

    /**
     * @test
     */
    public function it_does_not_create_book_when_guest()
    {
        $this->visit('users/create')
            ->seePageIs('login');
    }

    /**
     * @test
     */
    public function it_deletes_a_book()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('users')
            ->press('Delete')
            ->seePageIs('/users');
    }

}
