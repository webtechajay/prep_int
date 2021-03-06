<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Crud


Route::get('/', 'SchoolController@index');
Route::get('/create', 'SchoolController@create');
Route::post('/store', 'SchoolController@store');
Route::get('/edit/{edit}', 'SchoolController@edit');
Route::post('/update/{update}', 'SchoolController@update');
Route::get('/delete/{delete}', 'SchoolController@destroy');


//Mail

Route::get('send-email', function(){
	$details = [

		'title'=>'Mail from ajay',
		'body'=>'Hey lavde'
	];


	\Mail::to('theajayrathod05@gmail.com')->send(new \App\Mail\MyTestMail($details));

	dd("Email send successfully !");
});


//ImageFile Upload


Route::get('/image', 'ImageController@index');
Route::get('/image/add', 'ImageController@create');
Route::post('/image/store', 'ImageController@store');
Route::get('/image/{delete}', 'ImageController@destroy');


//ChroneJob



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//RazorPay

Route::get('my-store', 'razorpay\PaymentController@show_products');
Route::post('pay-success', 'razorpay\PaymentController@pay_success');
Route::post('thank-you', 'razorpay\PaymentController@thank_you');





//Ajax form submission 

Route::get('/emp-create', 'EmpController@create');
Route::post('/emp-store', 'EmpController@store');