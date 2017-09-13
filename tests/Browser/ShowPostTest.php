<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowPostTest extends DuskTestCase
{
    Use DatabaseMigrations;

    public function test_a_user_can_see_the_book_details()
    {
        $user = $this->defaultUser([
            'name' => 'Faustino Vasquez',
        ]);
        $book = $this->createBook([
            'title' => 'Este es titulo del libro',
            'abstract' => 'Este es el abstract del libro',
            'user_id' => $user->id
        ]);

        $this->browse(function (Browser $browser) use ($book) {
            $browser->visit($book->url)
                    ->assertSeeIn('h1', $book->title)
                    ->assertSee($book->abstract)
                    ->assertSee('Faustino Vasquez');
        });
    }
}
