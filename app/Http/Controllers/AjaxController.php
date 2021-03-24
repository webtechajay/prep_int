<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class AjaxController extends Controller
{
    public function create(){

    	return view('ajax.create');

    }

    public function employeeStore(Request $request){

    	// dd($request->all());
    	$store = new Employee();
    	$store->name = $request->name;
    	$store->email = $request->email;
    	$store->save();


    }
}
