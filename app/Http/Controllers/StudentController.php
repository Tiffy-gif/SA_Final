<?php

namespace App\Http\Controllers;

use App\Models\Student;
//use Illuminate\Http\Request;

class StudentController extends Controller
{
    

    public function student()
    {
        $students = Student::all(); // fetch from DB
        return view('studentlist',compact('students'));
    }

    public function attendance()
    {
        $students = Student::where('status', 'active')->get(); // optional filter
        return view('page.attendance', compact('students'));
    }
    
    public function GroupSU(){
        $students = Student::where('status', 'active')->get(); // optional filter
        return view('page.attendance', compact('students'));
    }

     
}
