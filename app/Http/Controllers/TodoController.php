<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreationRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        return view('todos.index');
    }

    public function create(){
        return view('todos.create');
    }

    public function editTodo(){
        return view('todos.edit');
    }

    private function sanitizeData($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return stripcslashes($data);
    }

    public function store(TodoCreationRequest $request){
        if(trim($request->title)) {
            $taskTitle = $this->sanitizeData($request->title);
            Todo::storeTodo($taskTitle);
            return redirect()->back()->with('success_message', 'Todo saved successfully!');
        }
        return redirect()->back()->with('error_message', 'Error! Task tiltle should not be empty');
    }
}
