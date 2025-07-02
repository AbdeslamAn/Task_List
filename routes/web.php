<?php

use App\Http\Requests\TaskRequest;
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

Route::get('/tasks/{task}/edit', function (Task $task) {
     return view('edit', ['task' => $task]);
})->name('tasks.edit');




Route::get('/tasks/{task}', function   (Task $task) {
     return view('show', ['task' =>$task]);
})->name('tasks.show');



// Display sent information
// Gesendete Informationen anzeigen
/*
Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');*/


    //  Route to store a new task
    //  Route zum Speichern einer neuen Aufgabe (Task)
Route::post('/tasks', function (TaskRequest $request) {

    /* $data = $request->validated();
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
    $task->save();*/

    // or

    $task = Task::create($request->validated());

    //  Redirect to the task's detail page
    //  Zur Detail-Seite der Aufgabe weiterleiten
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('succes', 'Aufgabe erfolgreich erstellt');
})->name('tasks.store');



Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
   /* $data = $request->validated();
    $task->title = $data['title'];
    $task->Beschreibung = $data['beschreibung'];
    $task->lang_Beschreibung = $data['lang_beschreibung'];
    $task->save();*/

    //or

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('succes', 'Aufgabe erfolgreich ändert');
})->name('tasks.update');


Route::delete('/tasks/{task}', function (Task $task) 
{
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('succes',"Aufgabe erfolgreich gelöscht");
})->name('tasks.destroy');

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
