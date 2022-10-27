<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreationRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function show(){
        $todos = Todo::orderBy('completed')->get(); //No need of order by? use Todo::all()
        return view('todos.index')->with(['todos' => $todos]);
    }

    public function create(){
        return view('todos.create');
    }

    public function editTodo(Todo $todo){
        return view('todos.edit', compact('todo'));
    }

    private function sanitizeData($data): string
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return stripcslashes($data);
    }

    public function store(TodoCreationRequest $request){
        $taskTitle = $this->sanitizeData($request->title);
        Todo::storeTodo($taskTitle);
        return redirect()->back()->with('success_message', 'Todo saved successfully!');
    }

    public function update(TodoCreationRequest $request, Todo $todo){
        $taskTitle = $this->sanitizeData($request->title);
        $completed = (bool)$request->completed;
        $todo->update(['title'=> $taskTitle, 'completed' => $completed]);
        return redirect(route('todo.index'))->with('success_message', 'Todo updated successfully!');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect(route('todo.index'))->with('success_message', 'Todo deleted Successfully!');
    }

    public function completeTodo(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect(route('todo.index'))->with('success_message', 'Todo marked as completed!');
    }
}
