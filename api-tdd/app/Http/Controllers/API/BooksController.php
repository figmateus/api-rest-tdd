<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookFormRequest;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function __construct(private Book $book)
    {

    }

    public function index()
    {
        return response()->json($this->book->all());
    }

    public function show(int $id)
    {
        $book = $this->book->find($id);
        return response()->json($book);
    }

    public function store(CreateBookFormRequest $request)
    {
        $book = $this->book->create($request->all());
        return response()->json($book, 201);
    }
}
