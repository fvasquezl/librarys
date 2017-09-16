<?php

namespace App\Http\Controllers;

use App\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Styde\Html\Facades\Alert;

class DeleteBookController extends Controller
{
    public function delete(Book $book)
    {
        $titulo = $book->title;
        if($book->pdfbook){
            File::delete('storage/'.$book->pdfbook);
        };
       $book->delete();

       Alert::success('El libro "'.$titulo.'" ha sido eliminado');

       return(redirect('/'));
    }
}
