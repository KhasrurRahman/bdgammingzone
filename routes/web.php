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


use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/cmd', function() {
////    Artisan::queue("queue:work");
//    Job::dispatch()->onQueue('general');
//});


Route::get('/foo', function () {
    Artisan::call("queue:work");

});


Auth::routes();
//fontend
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index2')->name('home2');
Route::resource('shedule','HomeController2');
Route::get('running','HomeController2@running')->name('running');
Route::get('single_mathc_result/{id}','HomeController2@single_mathc_result')->name('single_mathc_result');
Route::get('stream/{id}','HomeController2@stream')->name('stream');
Route::get('previous','HomeController2@previous')->name('previous');
Route::get('All_match_result','HomeController@All_match_result')->name('All_match_result');
Route::get('All_match_result_details/{id}','HomeController@All_match_result_details')->name('All_match_result_details');
Route::get('contactUs','HomeController@contactUs')->name('contactUs');
Route::post('contactUs_save','HomeController@contactUs_save')->name('contactUs_save');
Route::get('rules','HomeController@rules')->name('rules');
Route::get('clan','HomeController@clan')->name('clan');


//admin Route
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){

    Route::get('dashbord','DashbordController@index')->name('dashbord');
    Route::resource('match_shedule','match_shedule');
    Route::get('move/{id}','match_shedule@move')->name('move');
    Route::get('move2/{id}','match_shedule@move2')->name('move2');
    Route::get('moveTooldmatch/{id}','match_shedule@moveTooldmatch')->name('moveTooldmatch');
    Route::get('cancel_match/{id}','match_shedule@cancel_match')->name('cancel_match');
    //running match
    Route::get('runningMatch','match_shedule@runningMatch')->name('runningMatch');
    //result
    Route::resource('result','ResultsController');
    Route::post('result_update2/{id}','ResultsController@result_update2')->name('result_update2');
    //participants
    Route::resource('participants','Participants');
    Route::get('All_participants/{id}','Participants@All_participants')->name('All_participants');
    //all user
    Route::resource('all_user','MatchUserController');
    //pervios match
    Route::get('previous','match_shedule@previous')->name('previous');
    //room create
    Route::get('room/{id}','match_shedule@room')->name('room');
    //room id and password saved
    Route::post('room_save/{id}','match_shedule@room_save')->name('room_save');
    //all done match
    Route::get('old_match','oldMatchController@old_match')->name('old_match');
    //notification send and save room password
    Route::get('send_notification/{id}','send_notification@send_notification')->name('send_notification');
    //block user
    Route::get('block_user','BlockUserController@index')->name('block_user');
    Route::post('block_user_create','BlockUserController@block_user_create')->name('block_user_create');
    Route::get('block_user_delete/{id}','BlockUserController@block_user_delete')->name('block_user_delete');
    //withdraw request
    Route::get('withdraw_request','withdraw_request_Controller@index')->name('withdraw_request');
    Route::get('withdraw_request_delete/{id}','withdraw_request_Controller@delete')->name('withdraw_request_delete');
    Route::get('withdraw_request_paid/{id}','withdraw_request_Controller@paid')->name('withdraw_request_paid');
//    deposit
    Route::get('deposit','deposit@deposit')->name('deposit');
    Route::get('deposi_confirm/{id}','deposit@deposi_confirm')->name('deposi_confirm');
    //contact us
    Route::get('contact','DashbordController@contact')->name('contact');
    Route::get('contact_delete/{id}','DashbordController@contact_delete')->name('contact_delete');
    //ser payment number
    Route::post('payment_number','send_notification@payment_number')->name('payment_number');


});


//author route
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function(){
    Route::get('dashbord','DashbordController@index')->name('dashbord');
    Route::post('entry/{id}','DashbordController@entry')->name('entry');
    Route::get('profile','DashbordController@profile')->name('profile');
    Route::post('profile_save','DashbordController@profile_save')->name('profile_save');
    Route::get('confirm_join/{id}','DashbordController@confirm_join')->name('confirm_join');
    Route::PUT('password_update','DashbordController@password_update')->name('password_update');
//wallet
    Route::get('wallet','AccountController@wallet')->name('wallet');
    Route::post('withdraw_confirm','AccountController@withdraw_confirm')->name('withdraw_confirm');
    Route::post('deposit_confirm','AccountController@deposit_confirm')->name('deposit_confirm');
    Route::post('convert_win_to_balance','AccountController@convert_win_to_balance')->name('convert_win_to_balance');

});
