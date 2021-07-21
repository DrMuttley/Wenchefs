<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\Note;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    public function restaurants(){
        return $this->belongsToMany(Restaurant::class)->withTimestamps();
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
