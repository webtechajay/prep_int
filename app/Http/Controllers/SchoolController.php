<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class SchoolController extends Controller
{

	public function index(){
		$read = Student::all();
		return view('school.index', compact('read'));
	}
    public function create(){

    	return view('school.create');
    }


    public function store(Request $request){

    	$store = new Student();
    	$store->email = $request->email;
    	$store->pwd = $request->pwd;
    	$store->save();

    	return redirect('/');

    }

    public function edit($id){

    	$edit = Student::find($id);

    	return view('school.edit', compact('edit'));
    }

    public function update(Request $request, $id){

    	$update = Student::find($id);
    	$update->email = $request->email;
    	$update->pwd = $request->pwd;
    	$update->save();

    	return redirect('/');

    }

    public function destroy($id){

        $delete  = Student::find($id);
        $delete->delete();

        return redirect('/');
    }
}
