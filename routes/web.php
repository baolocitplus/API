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

Route::get('reset_password/{token}', ['as' => 'password.reset', function($token)
{
    // implement your reset password route here!
}]);

Route::get('/user', 'HomeController@index')->name('user');

// Auth::routes();
// Route::get('list','HomeController@list')->name('list');
Route::get('/home', 'HomeController@index');
Route::get('login', function () {
    return view('login');
});
 
// Route::get('list', function () {return view('list');})->name('list');

// Route::group(['middleware' => ['auth:api']], function () {
      Route::get('list', function () {return view('list');})->name('list');
  // Route::get('list','HomeController@list')->name('list');
// });

//   Route::get('list',['as'=>'list'] ,function(){
//     if(Auth::check()){
//         return redirect()->action('HomeController@list');
//     }else{
//         return view('login');
//     }
// });
