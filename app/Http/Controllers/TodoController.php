<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title'=> 'required']);

        $todo = Todo::create([
            'title' => $validatedData['title'],
            'todoList_id' => $request->todoList_id,
        ]);

        return $todo->toJson();
    }

    public function markAsCompleted(Todo $todo)
    {
        $todo->is_completed = true;
        $todo->update();

        return response()->json('Todo updated!');
    }
}
