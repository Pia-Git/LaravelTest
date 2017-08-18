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

//use App\Task;

/*Route::get('/', function () {
	
	$tasks = DB::table('tasks')->get();
	
    return view('welcome', compact('tasks'));
});*/

Route::get('/', 'PostController@index')->name('home');

Route::get('/posts/create', 'PostController@create');

Route::post('/posts', 'PostController@store');

Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts/{post}/comments', 'CommentController@store');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');


/* Posts Info (Basic for Controller)

GET /posts

GET /posts/create

POST /posts

GET /posts/{id}/edit

GET /posts/{id}

PATCH /posts/{id}

DELETE /posts/{id}

 */

//controller => PostsController
//Eloquent model => Post
//migration => create_posts_table

//Route::get('/tasks', 'TasksController@index');

//Route::get('/tasks/{task}', 'TasksController@show');




/*Route::get('/tasks', function () {

	//$tasks = DB::table('tasks')->latest()->get();
	
	$tasks = Task::all();

	return view('tasks.index', compact('tasks'));
});*/


/*Route::get('/tasks/{task}', function ($id) {

	//dd($id);
	
	//$task = DB::table('tasks')->find($id);
	
	$task = Task::find($id);
	
	//dd($task);
	
	//$tasks = DB::table('tasks')->get();

	return view('tasks.show', compact('task'));
});*/
