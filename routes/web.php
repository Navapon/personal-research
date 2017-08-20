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
Auth::routes();

Route::resource('profile', 'ProfileController');

Route::resource('research', 'ResearchContoller');

Route::resource('journal', 'JournalController');

Route::resource('conference', 'ConferenceController');

Route::resource('project', 'ProjectController');

Route::resource('patent', 'PatentController');

Route::resource('equipment', 'ResearchEquipmentController');

Route::resource('blog', 'BlogController');

Route::post('profile/uploadProfileImage', 'ProfileController@uploadProfileImage');
Route::post('authen', 'Auth\LoginController@authenticate')->name('authen');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', function () {
    return view('static.contact');
})->name('contact');

Route::get('/flow', function () {
    return view('static.flow');
})->name('flow');

Route::get('/strategy', function () {
    return view('static.strategy');
})->name('strategy');

Route::get('/download', function () {
    return view('static.download');
})->name('download');



Route::get('/structure', function () {

    $users1 = \App\ProfileModel::where('committee','=','1')->get();
    $users2 = \App\ProfileModel::where('committee','=','2')->get();
    $users3 = \App\ProfileModel::where('committee','=','3')->get();
    $users4 = \App\ProfileModel::where('committee','=','4')->get();
    $users5 = \App\ProfileModel::where('committee','=','5')->get();

    $data = array(
        'users1' => $users1,
        'users2' => $users2,
        'users3' => $users3,
        'users4' => $users4,
        'users5' => $users5,
    );

//    dd($users1);

    return view('static.structure')->with($data);
})->name('structure');



Route::get('report','ReportController@index')->name('report');

Route::get('report-journal','ReportJournalController@index')->name('report-journal');

Route::get('report-project','ReportProjectController@index')->name('report-project');

Route::get('profile.myprofilecv','ProfileController@myprofilecv')->name('profile.myprofilecv');





