<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Styde\Html\Facades\Alert;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=> 'required']);
        $category = Category::create($request->all());
        Alert::success('La categoria "'.$category->name.'" ha sido creada');
        return redirect(route('categories.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $category
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Category $category)
    {
       $request->validate(['name'=> 'required']);
       $category->update(['name' => $request->get('name')]);
       Alert::success('La categoria "'.$category->name.'" ha sido actualizado');

       return redirect(route('categories.index'));
    }

}
