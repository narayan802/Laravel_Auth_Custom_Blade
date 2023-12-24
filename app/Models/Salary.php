<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employe;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'salary'
    ];
    public function employees()
    {
        return $this->belongsTo(Employe::class);
    }
}
