<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\AddImage;

class ImageController extends Controller
{

	public function index(){
		$read = AddImage::all();
		return view('image.index', compact('read'));
	}
    public function create(){

    	return view('image.create');
    }

    public function store(Request $request)

    {

      request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       if ($files = $request->file('image')) {
       	// Define upload path
           $destinationPath = public_path('/uploads/images'); // upload path
		// Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);

           $insert['image'] = "$profileImage";
        // Save In Database
			$imagemodel= new AddImage();
			$imagemodel->image="$profileImage";
			$imagemodel->save();
        }

        return redirect('/image');

    }

    public function destroy($id){

    	$delete = AddImage::find($id);

    	$delete->delete();

    	return redirect('/image');
    }

    		
}
