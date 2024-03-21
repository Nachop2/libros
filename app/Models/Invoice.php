<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientName',
        'clientAddress',
        'clientCity',
        'clientZip',
        'clientCountry',
        'invoiceDate'
    ];

    public function books()
    {
        return $this->hasMany('Books');
    }
}
