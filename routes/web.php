<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;

use App\Models\Task;


Route::get('/', function () {
   return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->where('completed', true)->get();

    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');


Route::get('tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');


Route::get('tasks/{task}', function (Task $task) {

    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create([
        'title' => $request['title'],
        'description' => $request['description'],
        'long_description' => $request['long_description']
    ]);

    # redirect with flash messages
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {

    $task->update([
        'title' => $request['title'],
        'description' => $request['description'],
        'long_description' => $request['long_description']
    ]);

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully');

})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully');
})->name('tasks.destroy');

Route::fallback(function () {
    return 'Still got somewhere!';
});

