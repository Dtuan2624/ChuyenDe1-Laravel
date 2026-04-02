<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{

    //
    public function index()
        {
            $employees = Employee::paginate(5);
            return view('employees.index', compact('employees'));
        }
    public function create()

        {

        $departments = Department::all(); 
        return view('employees.create', compact('departments'));

        }
        public function edit($id) 
        { 
            $employee = Employee::findOrFail($id); 
            $departments = Department::all(); 
            return view('employees.edit', compact('employee', 'departments')); 
        }
        public function update(Request $request, $id) 
        { 
            $employee = Employee::findOrFail($id); 
            $employee->update($request->all()); 
            return redirect()->route('employees.index'); 
        }
        public function destroy($id) 
        { 
            Employee::destroy($id); 
            return redirect()->route('employees.index'); 
        }
    public function store(Request $request)

        {

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Thêm thành công');

        }
    public function dashboard()
        {
            $totalEmp = Employee::count();
            $totalDep = Department::count();
            $newEmp = Employee::latest()->take(5)->get();

            return view('dashboard.dashboard', compact('totalEmp', 'totalDep', 'newEmp'));
        }
}