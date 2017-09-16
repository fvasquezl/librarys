<?php

namespace App\Http\Controllers;

use App\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DeleteBookController extends Controller
{
    public function delete(Book $book)
    {
        if($book->pdfbook){
            File::delete('storage/'.$book->pdfbook);
        };

       $book->delete();
       return(redirect('/'));
    }
}
