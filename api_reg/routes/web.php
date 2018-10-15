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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/demo', function () {
    return view('demo');
});
/*Route::get('/home', function () {
    return view('home');
}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
/*Route::get('/', function () {
    
    return view('welcome');
});
Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout']);

Route::post('/home', ['uses' => 'Main\MainController@index']);

Route::get('/registration', function () {
    return view('registration');
})->name('registration');


Route::post('/registrate', ['uses' => 'Registration\RegistrationController@processRegistrationRequest'])->name('registrate');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'PagesController@home');

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::get('/init_nbc', 'PagesController@init_nbc');
Route::post('/download_nbc', 'PagesController@download_nbc');
*/
Route::post('/create_keys', 'PagesController@create_keys')->name('create_keys');
Route::get('/documentation', 'PagesController@documentation');
Route::get('/documentation/{title}', 'PagesController@show_doc')->name('show-doc');
Route::get('/doc-edit/{title}', 'DocumentsController@edit')->name('edit-doc');


Route::group(['middleware' => 'web'], function () {
    Auth::routes();

    Route::get('/', function () {
              
        return view('auth.login');
    })->name('main');
    Route::get('/home', 'PagesController@home');
    Route::get('/changePassword','HomeController@showChangePasswordForm');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

    Route::get('/init_nbc', 'PagesController@init_nbc');
    Route::post('/download_nbc', 'PagesController@download_nbc');
    Route::get('/author', [
        'uses' => 'AppController@getAuthorPage',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin', 'Author']
    ]);
    Route::get('/author/generate-article', [
        'uses' => 'AppController@getGenerateArticle',
        'as' => 'author.article',
        'middleware' => 'roles',
        'roles' => ['Author']
    ]);
  
    Route::get('/admin', [
        'uses' => 'AppController@getAdminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
    Route::post('/admin/assign-roles', [
        'uses' => 'AppController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
   
    Route::get('/registration', function () {
    
        return view('registration');
    })->name('registration');
    
    Route::post('/registrate', 
    ['uses' => 'Registration\RegistrationController@processRegistrationRequest'])->name('registrate');

    Route::get('/signin', [
        'uses' => 'AuthController@getSignInPage',
        'as' => 'signin'
    ]);
    Route::post('/signin', [
        'uses' => 'AuthController@postSignIn',
        'as' => 'signin'
    ]);
    Route::get('/logout', [
        'uses' => 'AuthController@getLogout',
        'as' => 'logout'
    ]); 

Route::get('verify/{email}/{verify_token}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
//Route::get('password/forgotten/{token}','Auth\RegisterController@canRestPassword')->name('sendForgottenEmailDone');
// Password reset routes...
Route::post('password/reset', 'Auth\ForgotPasswordController@resetPassword')->name('password.reset');
Route::get('password/reset', 'Auth\ForgotPasswordController@sendForgottenEmailForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendForgottenEmail')->name('password.email');
Route::get('password/email', 'Auth\ForgotPasswordController@viewForgottenEmail')->name('password.email');
Route::get('forgotten/{token}', 'Auth\ForgotPasswordController@sendForgottenEmailDone')->name('sendForgottenEmailDone');
//Route::get('forgotten/{token}', array('uses' => 'ForgotPasswordController@sendForgottenEmailDone'))->name('sendForgottenEmailDone');
});

