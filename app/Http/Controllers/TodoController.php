<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreationRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    //Protecting the controller for authenticated users only
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        //$todos = Todo::orderBy('completed')->get(); //No need of order by? use Todo::all()
        $todos = (auth()->user()->email === 'admin@gmail.com') ? Todo::orderBy('completed')->get() : auth()->user()->todos()->orderBy('completed')->get();
        return view('todos.index')->with(['todos' => $todos]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function editTodo(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    private function sanitizeData($data): string
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return stripcslashes($data);
    }

    public function store(TodoCreationRequest $request)
    {
//        Todo::storeTodo($taskTitle);
        $request['title'] = $this->sanitizeData($request->title);
        auth()->user()->todos()->create($request->all());
        return redirect()->back()->with('success_message', 'Todo saved successfully!');
    }

    public function update(TodoCreationRequest $request, Todo $todo)
    {
        $taskTitle = $this->sanitizeData($request->title);
        $completed = (bool)$request->completed;
        $todo->update(['title'=> $taskTitle, 'completed' => $completed]);
        return redirect(route('todo.index'))->with('success_message', 'Todo updated successfully!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todo.index'))->with('success_message', 'Todo deleted Successfully!');
    }

    public function completeTodo(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect(route('todo.index'))->with('success_message', 'Todo marked as completed!');
    }
}
