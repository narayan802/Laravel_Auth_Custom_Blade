<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employe;

class Department extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'dept_name'
    ];

    public function Employe()
    {
        return $this->belongsTo(Employe::class, 'dept_id', 'id');
    }
}
