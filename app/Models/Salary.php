<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employe;


class Salary extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'salary'
    ];
    public function Employe()
    {
        return $this->hasOne(Employe::class, 'id', 'sal_id');
    }
}
