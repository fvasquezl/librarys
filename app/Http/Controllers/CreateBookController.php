<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

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
            'pdfbook' => 'required|file|mimes:pdf|max:500000',
            'category_id' => 'required|exists:categories,id',
        ]);

       $book = auth()->user()->createBook($request->all());
       if($request->hasFile('pdfbook')){
           $book->pdfbook = $request->file('pdfbook')->store('pdfbooks','public');
           $book->save();
       }
        Alert::success('El libro "'.$book->title.'" ha sido creado');
       return redirect($book->url);
    }
}
