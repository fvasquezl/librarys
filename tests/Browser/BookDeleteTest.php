<?php

namespace Tests\Browser;

use Book;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BookDeleteTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_a_user_admin_can_delete_book()
    {
        $wrongBook = $this->createBook([
            'title' => 'Libro equivocado'
        ]);

        $user = $this->defaultUser([
            'name' => 'fvasquez',
            'role' => 'admin'
        ]);

        $this->browse(function (Browser $browser) use($user,$wrongBook) {
            $browser->loginAs($user)
                ->visit('/books/show/1-libro-equivocado')
                ->assertSeeIn('h1',$wrongBook->title)
                ->press('Eliminar_libro')
                ->assertPathIs('/');
        });

        $this->assertDatabaseMissing('books',[
            'title' => $wrongBook->title,
            'abstract' => $wrongBook->abstract,
            'slug' => $wrongBook->slug,
        ]);
    }

    public function test_a_user_cant_delete_book()
    {
        $wrongBook = $this->createBook([
            'title' => 'Libro equivocado'
        ]);

        $user = $this->defaultUser();

        $this->browse(function (Browser $browser) use($user,$wrongBook) {
            $browser->loginAs($user)
                ->visit('/books/show/1-libro-equivocado')
                ->assertSeeIn('h1',$wrongBook->title)
                ->assertDontSee('Eliminar_libro');
        });

        $this->assertDatabaseHas('books',[
            'title' => $wrongBook->title,
            'abstract' => $wrongBook->abstract,
            'slug' => $wrongBook->slug,
        ]);
    }

    public function test_a_guest_user_cant_delete_book()
    {
        $wrongBook = $this->createBook([
            'title' => 'Libro equivocado'
        ]);


        $this->browse(function (Browser $browser) use($wrongBook) {
            $browser->visit('/books/show/1-libro-equivocado')
                ->assertSeeIn('h1',$wrongBook->title)
                ->assertDontSee('Eliminar_libro');
        });

        $this->assertDatabaseHas('books',[
            'title' => $wrongBook->title,
            'abstract' => $wrongBook->abstract,
            'slug' => $wrongBook->slug,
        ]);
    }

}
