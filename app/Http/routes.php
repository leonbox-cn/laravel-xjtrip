<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





// Route::get('/home', function()
// {
//     return view('welcome');
// });
//
// Route::get('login', function () {
//     return '登录......';
// });
//
// Route::get('reg/{id}', function($id)
// {
//     return 'user' . $id;
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/', function()
    {
        return view('welcome');
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();  //系统自带的认证路由

    Route::get('/home', 'HomeController@index');

    Route::get('/products', function()
    {
        return view('products');
    });

    // Route::post('/products/add', function(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'product_title' => 'required|max:255',
    //     ]);
    //
    //     if ($validator->fails()) {
    //         return redirect('/')
    //             ->withInput()
    //             ->withErrors($validator);
    //     }
    //
    //     // Create The products...
    // });
    //
    // Route::delete('/products/{id}', function($id)
    // {
    //
    // });
});
