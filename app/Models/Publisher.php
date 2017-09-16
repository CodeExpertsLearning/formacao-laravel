<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = "publishers";

    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id');
    }
}
