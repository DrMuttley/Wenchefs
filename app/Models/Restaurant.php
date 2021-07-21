<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Note;

class Restaurant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];

    public function employees(){
        return $this->belongsToMany(Employee::class)->withTimestamps();;
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
