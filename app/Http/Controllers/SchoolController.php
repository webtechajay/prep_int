<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Hash;

class SchoolController extends Controller
{

	public  function index(){

        $read = APIController::index();
        // $read = Student::all();
        $read = json_decode($read);

        return view('school.index', compact('read'));
	}

    public function create(){

    	return view('school.create');
    }


    public function store(Request $request){
        
        $request->validate(
            [
                'email'=>'required|email|unique:users',
                'pwd'=>'required|min:5'
        ],
        [
            'email.required'=>'This field is required',
            'pwd.required'=>'Password is required'
        ]
    );

        // dd($request->all());
    	$store = new Student();
    	$store->email = $request->email;
    	$store->pwd = Hash::make($request->pwd);
    	$store->save();

        return redirect('/')->with('success', 'Account created successfully !');
    }

    public function edit($id){

    	$edit = Student::find($id);

        // return response($edit);
    	return view('school.edit', compact('edit'));
    }

    public function update(Request $request, $id){

    	$update = Student::find($id);
    	$update->email = $request->email;
    	$update->pwd = Hash::make($request->pwd);
    	$update->save();
        return redirect('/');

    }

    public function destroy($id){

        $delete  = Student::find($id);
        $delete->delete();
        return redirect('/');
    }
}
