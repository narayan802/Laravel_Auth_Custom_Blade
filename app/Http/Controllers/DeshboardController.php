<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Employe;
use App\Models\Salary;

class DeshboardController extends Controller
{

    public function showdata()
    {

        return view('dashboard');
    }
    public function empform()
    {
        $options = Department::all();

        return view('addemp', compact('options'));
    }

    public function addedpt()
    {
        return view('add_dpt');
    }
    public function savedpt(Request $request)
    {

        $request->validate([
            'dep_name' => 'required|max:10',
        ]);
        $user = new Department;
        $user->dept_name = $request->dep_name;
        $user->save();
        return redirect('dashboard')->with('message', 'Depertment Added Sucessfully');
    }

    public function save(Request $request)
    {
        $num = Salary::get();
        $num->salary = $request->sal;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:Employee',
            'phone' => 'required|numeric|min:10|max:10',
            'department_name' => 'required'
        ]);

        $user = new Employe;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dept_id = $request->department_name;
        $user->sal_id =  $num->salary;

        $user->save();
        return redirect('dashboard')->with('message', 'Employee Added Sucessfully');
    }
}
