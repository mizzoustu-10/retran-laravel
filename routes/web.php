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
use App\Search;

Route::get('/','homeController@index')->name('home');
Route::get('/index','homeController@index')->name('login');
Route::get('/batch','homeController@batch');

Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegistrationController@create');
Route::post ('/register', 'RegistrationController@store');

Route::get('viewRecordsGUI','firstController@index');
/*

//Route::get('search', 'SearchController@index');
//Replaces Below w/Controller

Route::get('search', function(){
    //$search = App\Search::where('APN', '=', '501-422-018-')->get();
    $search= App\Search::limit(35)->offset(35)->get();
    return view('search', compact('search'));
});
*/

// Route::get('bookmarkRecord/{count2}', 'bookmarkController@bookmarkRecord');
Route::post('bookmarkRecord', 'bookmarkController@bookmarkRecord');
Route::post('bookmark/{bookmark}', 'bookmarkController@destroyBookmark');

# Account
Route::get('/account', 'userController@show')->name('account');



Route::get('search/{count2}', 'SearchController@resultdetails');

//Replaces Below w/Controller
/*
Route::get('search/{search}', function ($id){
    
    $search = App\Search::find($id);
    dd($search);
    return view('search', compact('search'));

});
*/

/*Route::get('searchresult', 'SearchController@search');
Route::get('searchresult', function(){
    return view('results');
});
*/

Route::get('search', 'SearchController@index');

Route::get('batchsearch', 'SearchController@batchsearch');
Route::post('batchsearch', 'SearchController@batchsearch');
/*
Route::get('/view-records', function(){
    $query = Request::get('q');
    return $query;

    if ($query)
    {
        $posts = Post::where('APN', 'LIKE', "%$query%") ->get();
    }
    else
    {
        $posts = Post::all();
    }
    return view('stud_view');
});
*/

//Route::get('form-records','FormViewController@index');

