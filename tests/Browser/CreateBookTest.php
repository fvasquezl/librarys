<?php

namespace Tests\Browser;

use App\Category;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateBookTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected $title = 'El Titulo del Libro';
    protected $abstract = 'Resumen del libro';

    public function test_a_user_can_create_a_book()
    {
        $user = $this->defaultUser();
        $category = factory(Category::class)->create();

        $this->browse(function (Browser $browser) use ($user,$category){
            $browser->loginAs($user)
                ->visitRoute('books.create')
                ->type('title',$this->title)
                ->type('abstract',$this->abstract)
                ->select('category_id',$category->id)
                ->press('Publicar')
                ->assertPathIs('/books/show/1-el-titulo-del-libro');
        });

        $this->assertDatabaseHas('books',[
            'title' => $this->title,
            'abstract' => $this->abstract,
            'slug' => 'el-titulo-del-libro',
            'category_id' =>$category->id
        ]);
    }
}
