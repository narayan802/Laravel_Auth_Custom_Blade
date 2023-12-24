<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employe;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'dept_name'
    ];

    public function employees()
    {
        return $this->hasMany(Employe::class);
    }
}
