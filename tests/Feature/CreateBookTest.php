<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateBookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_create_a_book()
    {
        $this->withoutExceptionHandling();

        $title = 'El Titulo del Libro';
        $abstract = 'Resumen del libro';

            $this->actingAs($this->defaultUser())
                ->put(route('books.store'),[
                    'title' => $title,
                    'abstract' => $abstract
                ])->assertRedirect('books/show/1-el-titulo-del-libro');

            $this->assertDatabaseHas('books',[
                'title' => $title,
                'abstract' => $abstract,
                'slug' => 'el-titulo-del-libro',
            ]);
    }
}
