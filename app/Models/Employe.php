<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Salary;

class Employe extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'dept_id',
        'sal_id'
    ];
    public function Department()
    {
        return $this->hasOne(Department::class, 'id', 'dept_id');
    }
    public function Salary()
    {
        return $this->hasOne(Salary::class, 'id', 'sal_id');
    }
}
