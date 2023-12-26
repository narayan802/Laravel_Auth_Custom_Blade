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

        $emp = Employe::with('Department', 'Salary')->get();


        return view('dashboard', compact('emp'));
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
            'dept_name' => 'required|unique:Departments',
        ]);
        $user = new Department;
        $user->dept_name = $request->dept_name;
        if (!$user->save()) {
            return back()->with('message', `Depertment $request->dept_name already exist`);
        }
        return redirect('dashboard')->with('message', 'Depertment Added Sucessfully');
    }

    public function save(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:Employes',
            'phone' => 'required|numeric|min:10',
            'department_name' => 'required',
            'sal' => 'required|numeric'
        ]);

        $salary = Salary::create([
            'salary' => $request->sal
        ]);

        Employe::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dept_id' => $request->department_name,
            'sal_id' => $salary->id
        ]);


        return redirect('dashboard')->with('message', 'Employee Added Sucessfully');
    }
    public function edit($id)
    {
        $employee = Employe::where('id', $id)->first();
        $options = Department::all();

        return view('edit', compact('employee', 'options'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employe::where('id', $id)->first();
        $salary = Salary::where('id', $employee->sal_id)->first();
        $salary->salary = $request->sal;
        if ($salary->save()) {
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->dept_id = $request->dept_id;
            $employee->save();
            return redirect('dashboard')->with('message', 'Employee Update Sucessfully');
        }
        return redirect('dashboard')->with('error', 'Something went wrong');
    }
    public function destroy($id)
    {
        $emp = Employe::where('id', $id)->first();
        $emp->Salary()->delete();
        $emp->delete();
        return redirect('dashboard');
    }
}