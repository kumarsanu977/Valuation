<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

	
	Route::get('', 'HomeController@index')->name('index');
	Route::get('home', 'HomeController@index')->name('home');




/* routes for Clients Controller */
	Route::get('clients', 'ClientsController@index')->name('clients.index');
	Route::get('clients/index/{filter?}/{filtervalue?}', 'ClientsController@index')->name('clients.index');	
	Route::get('clients/view/{rec_id}', 'ClientsController@view')->name('clients.view');	
	Route::get('clients/add', 'ClientsController@add')->name('clients.add');
	Route::post('clients/add', 'ClientsController@store')->name('clients.store');
		
	Route::any('clients/edit/{rec_id}', 'ClientsController@edit')->name('clients.edit');	
	Route::get('clients/delete/{rec_id}', 'ClientsController@delete');

/* routes for Owners Controller */
	Route::get('owners', 'OwnersController@index')->name('owners.index');
	Route::get('owners/index/{filter?}/{filtervalue?}', 'OwnersController@index')->name('owners.index');	
	Route::get('owners/view/{rec_id}', 'OwnersController@view')->name('owners.view');
	Route::get('owners/masterdetail/{rec_id}', 'OwnersController@masterDetail')->name('owners.masterdetail');	
	Route::get('owners/add', 'OwnersController@add')->name('owners.add');
	Route::post('owners/add', 'OwnersController@store')->name('owners.store');
		
	Route::any('owners/edit/{rec_id}', 'OwnersController@edit')->name('owners.edit');	
	Route::get('owners/delete/{rec_id}', 'OwnersController@delete');

/* routes for Plots Controller */
	Route::get('plots', 'PlotsController@index')->name('plots.index');
	Route::get('plots/index/{filter?}/{filtervalue?}', 'PlotsController@index')->name('plots.index');	
	Route::get('plots/view/{rec_id}', 'PlotsController@view')->name('plots.view');	
	Route::get('plots/add', 'PlotsController@add')->name('plots.add');
	Route::post('plots/add', 'PlotsController@store')->name('plots.store');
		
	Route::any('plots/edit/{rec_id}', 'PlotsController@edit')->name('plots.edit');	
	Route::get('plots/delete/{rec_id}', 'PlotsController@delete');

/* routes for Projects Controller */
	Route::get('projects', 'ProjectsController@index')->name('projects.index');
	Route::get('projects/index/{filter?}/{filtervalue?}', 'ProjectsController@index')->name('projects.index');	
	Route::get('projects/view/{rec_id}', 'ProjectsController@view')->name('projects.view');
	Route::get('projects/masterdetail/{rec_id}', 'ProjectsController@masterDetail')->name('projects.masterdetail');	
	Route::get('projects/add', 'ProjectsController@add')->name('projects.add');
	Route::post('projects/add', 'ProjectsController@store')->name('projects.store');
		
	Route::any('projects/edit/{rec_id}', 'ProjectsController@edit')->name('projects.edit');	
	Route::get('projects/delete/{rec_id}', 'ProjectsController@delete');

/**
 * All routes which requires auth
 */
Route::middleware(['auth'])->group(function () {
	
	
});


	
Route::get('componentsdata/project_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->project_id_option_list($request);
	}
);
	
Route::get('componentsdata/owner_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->owner_id_option_list($request);
	}
);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');