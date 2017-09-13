<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class ListBookController extends Controller
{
    public function __invoke(Category $category= null, Request $request)
    {
        list($orderColumn,$orderDirection) = $this->getListOrder($request->get('orden'));
        $books = Book::query()
            ->with(['user','category'])
            ->fromCategory($category)
            ->fromSearch($request->get('search'))
            ->scopes($this->getRouteScope($request))
            ->orderBy($orderColumn, $orderDirection)
            ->paginate()
            ->appends(array_filter($request->only(['orden'])));

        return view('books.index', compact('books', 'category'));
    }
    protected function getRouteScope(Request $request)
    {
        $scopes = [
            'books.mine' => ['byUser' => [$request->user()]],
            'books.pending' => ['pending'],
            'books.completed' => ['completed']
        ];
        return $scopes[$request->route()->getName()] ?? [];
    }
    protected function getListOrder($order)
    {
        $orders = [
            'recientes' => ['created_at', 'desc'],
            'antiguos' => ['created_at', 'asc'],
        ];
        return $orders[$order] ?? ['created_at', 'desc'];
    }
}
