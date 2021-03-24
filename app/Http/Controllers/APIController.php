<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class APIController extends Controller
{
	public static function index(){
		$read = Student::all();
		// $read = SchoolController::index();
		// dd($read);
        return json_encode($read);
	}

	public static function store(Request $request){
        // dd($store);
    	$store = new Student();
    	$store->email = $request->email;
    	$store->pwd = $request->pwd;
    	if($store->save()){
    		return $response["status"] = "Success";
    	}else{
    		return $response["status"] = "Failure";
    	}
    }

    public static function edit($id){

    	$edit = Student::find($id);

        return json_encode($edit);
    	// return view('school.edit', compact('edit'));
    }

    public function update(Request $request, $id){

    	$update = Student::find($id);
    	$update->email = $request->email;
    	$update->pwd = $request->pwd;
    	if($update->save()){
            return $response["status"] = "success";
        }else{
            return $response["status"] = "failure";
        }

    }

    public function destroy($id){

        $delete  = Student::find($id);
        if($delete->delete()){

            return $response["status"] = "success";
        }else{
            return $response["status"] = "failure";
        }
    }

}
