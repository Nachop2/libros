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

        $books = Books::orderBy('name')->get();
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
        if (($book->stock - $amount) < 0) {
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
        $book = Books::create([
            'name' => $request->name,
            'isbn' => $request->isbn,
            'author' => $request->author,
            'imprenta' => $request->imprenta,
            'price' => $request->price,
            'sellingAt' => $request->sellingAt,
        ]);
        $book->stock = $request->stock;
        $book->save();
        return response()->json("The book has been created", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {
        return response()->json($book);
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
    public function update(UpdateBooksRequest $request, Books $book)
    {
        //return response()->json($book,400);
        $changes = false;
        if ($book->name != $request->name) {
            $book->name = $request->name;
            $changes = true;
        }
        if ($book->isbn != $request->isbn) {
            $book->isbn = $request->isbn;
            $changes = true;
        }
        if ($book->author != $request->author) {
            $book->author = $request->author;
            $changes = true;
        }
        if ($book->imprenta != $request->imprenta) {
            $book->imprenta = $request->imprenta;
            $changes = true;
        }
        if ($book->stock != $request->stock) {
            $book->stock = $request->stock;
            $changes = true;
        }
        if ($book->price != $request->price) {
            $book->price = $request->price;
            $changes = true;
        }
        if ($book->sellingAt != $request->sellingAt) {
            $book->sellingAt = $request->sellingAt;
            $changes = true;
        }


        if($changes){
            $book->save();
            return response()->json("Se actualizado correctamente",200);
        }else{
            return response()->json("No hubo ningun cambio",400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        //
    }
}
