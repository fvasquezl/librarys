<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateBookController extends Controller
{

    public function create()
    {
        $categories = Category::query()->pluck('name','id')->toArray();

        return view('books.create',compact('categories'));
    }


    public function store(Request $request)
    {

        $request->validate([
           'title' => 'required',
           'abstract' => 'required',
           'category_id' => 'required|exists:categories,id',
        ]);

       $book = auth()->user()->createBook($request->all());
       return redirect($book->url);
    }
}
