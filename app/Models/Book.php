<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    'title',
    'author',
    'edition',
    'year',
    'quantity',
    'available',
    'publisher_id'
  ];

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
}
