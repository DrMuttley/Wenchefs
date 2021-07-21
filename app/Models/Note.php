<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Restaurant;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'employee_id',
        'restaurant_id'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
