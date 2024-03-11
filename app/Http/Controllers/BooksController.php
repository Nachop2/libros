<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use Symfony\Component\HttpFoundation\Request;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $books = Books::all();
        return response()->json($books, 200);

    }

    public function addStock(Books $book, $amount)
    {
        $book->stock = $book->stock + $amount;
        $book->save();
        return response()->json("Stock has been added", 200);
        
        //return response()->json($books, 200);

    }
    public function removeStock(Books $book, $amount)
    {
        if(($book->stock - $amount)< 0){
            return response()->json("Stock cannot be negative", 400);
        }
        $book->stock = $book->stock - $amount;
        $book->save();
        return response()->json("Stock has been removed", 200);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBooksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBooksRequest $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        //
    }
}
