<?php

namespace App\Http\Controllers;

use App\Models\Group;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;


// use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function SU()
    {
        $Groups = Group::all();
        return view('page.mangeClass',compact('Groups')); //your Blade view file
    }

    

    
    public function su1()
    {
        $Groups = Group::all();
        return view('page.mangeStudent',compact('Groups')); //your Blade view file
    }


    public function su2()
    {
        // $Groups = Group::all();
        return view('page.student_dashboard'); //your Blade view file
    }
    //Show form
    public function edit($id) {
        $group = Group::findOrFail($id);
        return view('page.editGroup', compact('group'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z0-9\s]+$/',       // only letters and spaces
            'total_Student' => 'required|integer|min:0',      // only digits
        ]);

        $group = Group::findOrFail($id);
        $group->name = $request->input('name');
        $group->total_Student = $request->input('total_Student');
        $group->save();

        return redirect('/manage-class')->with('success', 'Class added successfully!');
    }


    
    // Delete group
    public function destroy($id) {
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->back()->with('success', 'Group deleted');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'total_Student' => 'required|integer|min:0',
        ]);

        Group::create([
            'name' => $request->input('name'),
            'total_Student' => $request->input('total_Student'),
        ]);

        return redirect('/manage-class')->with('success', 'Class added successfully!');
    }

}