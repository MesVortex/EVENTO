<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'venue',
        'description',
        'date',
        'availablePlaces',
        'validationType',
        'isValidByAdmin',
        'categoryID',
        'organizerID'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }
}
