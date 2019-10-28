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

Use App\User;
Use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {

    $user = User::findOrFail(1);

    //$post = new Post(['title' => 'second title', 'body' => 'second body']);

    $user->posts()->save(new Post(['title' => 'sample title', 'body' => 'sample body']));

});

Route::get('/read', function () {

    $user = User::findOrFail(1);

    foreach($user->posts as $post) {

        echo $post->title."<br />";
    }

});


Route::get('/update', function () {

    $user = User::findOrFail(1);

    //$user->posts()->whereId(4)->update(['title' => 'I love laravel', 'body' => 'This is awesome, thank you']);
    $user->posts()->where('id','=',5)->update(['title' => 'I love laravel 2', 'body' => 'This is awesome, thank you 2']);

});

Route::get('/delete', function () {

    $user = User::findOrFail(1);

    //$user->posts()->whereId(6)->delete();

    $user->posts()->delete();
});






