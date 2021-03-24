<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emp;

class EmpController extends Controller
{
    public function create(){

    	return view('emp.create');
    }

    public function store(Request $request){

    	$store = new Emp;
    	$store->name = $request->name;
    	$store->email = $request->email;
    	$store->save();

    }
}
