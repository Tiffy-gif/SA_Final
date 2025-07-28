<?php

namespace App\Http\Controllers;

use App\Models\Group;

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


}
