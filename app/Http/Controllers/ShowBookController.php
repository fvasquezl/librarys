<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class ShowBookController extends Controller
{
    public function __invoke(Book $book,$slug)
    {
        if($book->slug != $slug){
            return redirect($book->url,301);
        }
        return view('books.show',compact('book'));

    }
}
