<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'isbn',
        'author',
        'imprenta',
        'price',
        'sellingAt'
    ];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withPivot('amountSold','donation');
    }
}
