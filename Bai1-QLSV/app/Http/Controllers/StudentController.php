<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->keyword) {
            $query->where('name','like','%'.$request->keyword.'%');
        }

        $students = $query->orderBy('name')->paginate(5);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'major'=>'required',
            'email'=>'required|email|unique:students'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
                         ->with('success','Thêm thành công');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit',compact('student'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'major'=>'required',
            'email'=>'required|email|unique:students,email,'.$id
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')
                         ->with('success','Cập nhật thành công');
    }

    public function destroy($id)
    {
        Student::destroy($id);

        return redirect()->route('students.index')
                         ->with('success','Xóa thành công');
    }
}