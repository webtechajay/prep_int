<?php

namespace App\Http\Controllers\ajaxFormSubmit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Redirect,Response;

class ContactController extends Controller
{
    public function index()
    {
        return view('ajaxFormSubmit.contact_form');
    }       

    public function store(Request $request)
    {  
              
        $data = $request->all();
        $result = Contact::insert($data);
        if($result){ 
        	$arr = array('msg' => 'Contact Added Successfully!', 'status' => true);
        }
        return Response()->json($arr);
    }
}
