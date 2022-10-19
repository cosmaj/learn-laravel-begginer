<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public static function storeTodo($taskTitle){
        (new self)::create(['title' => $taskTitle]);
    }
}
