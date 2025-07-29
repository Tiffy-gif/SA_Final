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



    //Show form
    public function edit($id) {
        $group = Group::findOrFail($id);
        return view('page.editGroup', compact('group'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'student_amount' => 'required|integer',
        ]);

        $group = Group::findOrFail($id);
        $group->name = $request->input('name');
        $group->student_amount = $request->input('student_amount');
        $group->save();

        return redirect('/edit-group')->with('success', 'Group updated successfully');
    }


    
    // Delete group
    public function destroy($id) {
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->back()->with('success', 'Group deleted');
    }

}
