<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'todoList_id'];

    public function todoList()
    {
        return $this->belongsTo(TodoList::class);
    }
}
