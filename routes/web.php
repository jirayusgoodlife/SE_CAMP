<?php

use App\Http\Controllers\C_titles;
use App\Http\Controllers\MyController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', function(){
    session(['key' => 'value2']);
    return view('register');
});

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/register', function(Request $req){
    $user = new User();
    $user->name = $req->input('user_name');
    $user->email = $req->input('user_email');
    $user->password = Hash::make($req->input('user_password'));
    $user->save();
    return redirect('/login');
});

Route::post('login', function(Request $req){
    $email = $req->input('user_email');
    $password = $req->input('user_password');
    if(Auth::attempt(['email' => $email, 'password' => $password])){
        return view('home');
    } else {
        return redirect('/login');
    }

});

Route::get('logout', function(){
    session()->flush();
    Auth::logout();
    return Redirect('login');
});

Route::resource('titles', C_titles::class)->middleware('auth');

Route::get('/my-controller', [MyController::class, 'index']);

Route::get('/my-controller2', 'App\Http\Controllers\MyController@index');
Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/my-controller3', 'MyController@index');
    Route::post('/my-controller3-post', 'MyController@store');
});

Route::resource('/my-controller4', MyController::class);


Route::get('/', function () {
    return view('welcome'); // welcome.blade.php
});

// use Illuminate\Http\Request;

Route::get('/my-route', function(){
    // return view('myroute');
    //        Key    =>  Value
    $data = ['val_a' => 'Hello World!'];
    $data['val_b'] = "Laravel";
    return view('myfolder.mypage',$data);
});


Route::post('/my-route', function(Request $req){
    $data['myinput'] =  $req->input('myinput');
    return view('myroute', $data);
});
