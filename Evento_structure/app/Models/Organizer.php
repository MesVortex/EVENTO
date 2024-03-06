<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'isBanned',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'userID');
    }

    public function events(){
        return $this->hasMany(Event::class, 'organizerID');
    }
}
