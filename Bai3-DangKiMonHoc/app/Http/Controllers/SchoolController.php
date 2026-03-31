<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;

class SchoolController extends Controller
{
    // Sinh viên
    public function students()
    {
        $students = Student::paginate(5);
        return view('students.index', compact('students'));
    }

    public function createStudent()
    {
        return view('students.create');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:students,email',
            'major'=>'required|max:255'
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success','Thêm sinh viên thành công');
    }

    // Môn học
    public function courses()
    {
        $courses = Course::paginate(5);
        return view('courses.index', compact('courses'));
    }

    public function createCourse()
    {
        return view('courses.create');
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:courses,name|max:255',
            'credits'=>'required|integer|min:1|max:18'
        ]);
        Course::create($request->all());
        return redirect()->route('courses.index')->with('success','Thêm môn học thành công');
    }

    // Đăng ký môn
    public function enrollments()
    {
        $enrollments = Enrollment::with('student','course')->paginate(10);
        return view('enrollments.index', compact('enrollments'));
    }

    public function createEnrollment()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', compact('students','courses'));
    }

    public function storeEnrollment(Request $request)
    {
        $request->validate([
            'student_id'=>'required|exists:students,id',
            'course_id'=>'required|exists:courses,id'
        ]);

        $student = Student::find($request->student_id);
        $course = Course::find($request->course_id);

        // Kiểm tra trùng
        if($student->courses->contains($course->id)){
            return back()->withErrors('Sinh viên đã đăng ký môn này');
        }

        // Kiểm tra 18 tín chỉ
        $totalCredits = $student->totalCredits() + $course->credits;
        if($totalCredits > 18){
            return back()->withErrors('Tổng tín chỉ không được quá 18');
        }

        $student->courses()->attach($course->id);
        return redirect()->route('enrollments.index')->with('success','Đăng ký thành công');
    }
}
