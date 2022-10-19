<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title'];

    public static function storeTodo($taskTitle){
        (new self)::create(['user_id' => auth()->user()->id, 'title' => $taskTitle]);
    }
}
