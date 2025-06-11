<?php

use \App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    return view('index', [
        // 'tasks' => \App\Models\Task::all()
        // 'tasks' => \App\Models\Task::latest()->where('abgeschlossen', true)->get()
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
     return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

// Display sent information
// Gesendete Informationen anzeigen
/*
Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');*/


    //  Route to store a new task
    //  Route zum Speichern einer neuen Aufgabe (Task)
Route::post('/tasks', function (Request $request) {
    
    //  Validate the form input
    //  Eingaben vom Formular validieren (überprüfen)
    $data = $request->validate([
        'title' => 'required|max:255',
        'beschreibung' => 'required',
        'lang_beschreibung' => 'required'
    ]);

    //  Create a new task
    //  Neue Aufgabe erstellen
    $task = new Task;
    //  Insert form values into the task
    //  Werte aus dem Formular in die Aufgabe einfügen
    $task->title = $data['title'];
    $task->beschreibung = $data['beschreibung'];
    $task->lang_beschreibung = $data['lang_beschreibung'];
    //  Save the task in the database
    //  Aufgabe in der Datenbank speichern
    $task->save();

    //  Redirect to the task's detail page
    //  Zur Detail-Seite der Aufgabe weiterleiten
    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('succes', 'Aufgabe erfolgreich erstellt');
})->name('tasks.store');


// Route::get('/xxx', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

Route::fallback(function () {
    return 'Still got somewhere!';
});
