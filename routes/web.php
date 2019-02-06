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

Route::get('/', function () {
    //liste des messages du plus recent au plus ancien
    $messages=\App\Message::latest()->get();

    //affichage vue
    return view('home',['messages'=>$messages]);
});

Route::post('/', function(){
    $message = new \App\Message;
    $message->author_name=request('author_name', 'Inconnu');
    $message->content = request('content', '-');
    $message->save();

    return redirect('/');
});