<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index()
    {
        $todoLists = TodoList::where('is_completed', false)->orderBy('created_at', 'desc')->withCount(['todos' => function ($query){
            $query->where('is_completed', false);
        }])->get();

        return $todoLists->toJason();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $todoList = TodoList::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        return response()->json('TodoList created!');
    }

    public function show($id)
    {
        $todoList = TodoList::with(['todos' => function ($query) {
            $query->where('is_completed', false);
        }])->find($id);

        return $todoList->toJson();
    }

    public function maskAsCompleted(TodoList $todoList)
    {
        $todoList->is_completed = true;
        $todoList->update();

        return response()->json('TodoList updated!');
    }
}
