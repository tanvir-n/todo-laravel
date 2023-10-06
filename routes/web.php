<?php

use Illuminate\Support\Facades\Route;
use App\Models\Todo;
use Illuminate\Http\Request;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return view('home');
});

Route::get('/todos', function () {
    return view('todos', [
            'todos' => Todo::all()
        ]);
});

Route::get('/todos/create', function () {
    return view('create');
});

Route::post('/todos', function () {
    Todo::create(
            array_merge(
                request()->validate([
                'description' => ['required', 'min:4'],
                'title' => 'required|min:3|max:255',
                ]),
                ['completed' => is_null(request('completed')) ? 0 : 1]
            )
            );
    return redirect('/todos')->with('status',"Insert successfully");
});

Route::get('/todos/{id}', function ($id) {
    $todo = Todo::findOrFail($id);
    return view('show', [
        'todo' => $todo
    ]);
});

Route::get('todos/{id}/edit', function ($id) {
    return view('edit', [
            'todo' => Todo::findOrFail($id)
        ]);     
});

Route::patch('/todos/{id}', function ($id) {
    $todo = Todo::findOrFail($id);
    $todo->title = request('title');
    $todo->description = request('description');
    $todo->completed = is_null(request('completed')) ? 0 : 1;
    $todo->save();
    return redirect('/todos');
});

Route::delete('/todos/{id}', function ($id) {
    $todo = Todo::findOrFail($id);
    $todo->delete();
    return redirect('/todos');
});


Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
