<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books_invoice', function (Blueprint $table) {
            $table->unsignedBigInteger("books_id");
            $table->unsignedBigInteger("invoice_id");

            $table->foreign('books_id')->references('id')->on('books');

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->integer('amountSold');
            $table->decimal('priceSold');
            $table->boolean('donation')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books_invoice', function (Blueprint $table) {
            //
        });
    }
};
