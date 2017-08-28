<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
    'book_id',
    'client_id',
    'loan_date',
    'devolution_date',
    'return_date',
    'penalty'
  ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function book()
    {
        return $this->hasOne('App\Models\Book', 'id');
    }
}
