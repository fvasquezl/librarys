<?php

namespace Tests\Browser;

use App\Book;
use App\Category;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BooksListTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_a_user_can_see_the_books_list_and_go_to_the_details()
    {
        $book = $this->createBook([
            'title' => 'Este es el primer libro'
        ]);

        $this->browse(function (Browser $browser) use($book) {
            $browser->visit('/')
                ->assertSeeIn('h1','Libros')
                ->assertSee($book->title)
                ->clickLink($book->title)
                ->assertPathIs('/books/show/1-este-es-el-primer-libro');
        });
    }

    public function test_a_user_can_see_post_filtered_by_category()
    {
        //having
        $laravel = factory(Category::class)->create([
            'name'=>'Laravel','slug'=>'laravel'
        ]);
        $vue = factory(Category::class)->create([
            'name'=>'Vue.js','slug'=>'vue-js'
        ]);

        $laravelBook = factory(Book::class)->create([
            'title' =>'Libro de laravel',
            'category_id'=> $laravel->id
            ]);
        $vueBook = factory(Book::class)->create([
            'title' =>'Libro de Vue.js',
            'category_id' => $vue->id
            ]);
        //when
        $this->browse(function (Browser $browser) use($laravelBook,$vueBook) {
                $browser->visit('/')
                    ->assertSee($laravelBook->title)
                    ->assertSee($vueBook->title)
                    ->clickLink('laravel')
                    ->assertSeeIn('h1','Libro de laravel')
                    ->assertSee($laravelBook->title)
                    ->assertDontSee($vueBook->title);
        });
    }


    public function test_a_user_can_see_post_filtered_by_typing()
    {
        //having
        $laravelBook = factory(Book::class)->create([
            'title' =>'Libro de laravel',
            'abstract'=> 'programacion avanzada en laravel'
        ]);
        $vueBook = factory(Book::class)->create([
            'title' =>'Libro de Vue.js',
            'abstract' => 'programacion para principiantes en Vue.js y JavaScript'
        ]);
        $javascriptBook = factory(Book::class)->create([
            'title' =>'Libro de JavaScript',
            'abstract' => 'programacion avanzada en JavaScript'
        ]);

        //when
        $this->browse(function (Browser $browser) use($laravelBook,$vueBook,$javascriptBook) {
            $browser->visit('/')
                ->type('search','laravel avanzada')
                ->press('Ordenar')
                ->assertSee($laravelBook->title)
                ->assertSee($javascriptBook->title)
                ->assertDontSee($vueBook->title);
        });
    }
}
