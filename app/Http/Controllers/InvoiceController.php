<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Books;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreInvoiceRequest $request)
    {
        $invoice = Invoice::create([
            'clientName' => $request->clientName,
            'clientCountry' => $request->clientCountry,
            'clientAddress' => $request->clientAddress,
            'clientLocation' => $request->clientLocation,
            
            'clientCIF' => $request->clientCIF,
            'tax' => $request->tax,
        ]);
        // 'name' => $request->name,
        $invoice->save();

        foreach ($request->books as $book) {
            $bookSold = Books::find($book["id"]);
            $bookSold->stock -= $book["chosenQuantity"];
            $bookSold->save();
            $invoice->books()->attach($book["id"],['amountSold' => $book["chosenQuantity"],'priceSold' => $bookSold->sellingAt,'donation' => filter_var($book["donation"], FILTER_VALIDATE_BOOLEAN)]);
        }

        return response()->json($invoice->id, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $invoice = $invoice->load("books");
        return response()->json($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
