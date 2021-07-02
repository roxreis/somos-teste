<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function listTasks()
    {
        $tasks = Task::all();
        return view('listTask',['tasks' => $tasks]);
    }    
    
    public function createTask()
    {   
        $users = User::all();
        $categories = Category::all();
        return view('newTask', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    public function saveTask(Request $request)
    {   
        $request->validate([
            'user_id' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        Task::create($request->all());
        return redirect()->route('listTasks');
    }

    public function detailTask($id)
    {
        $task = Task::find($id);
        return view('detailTask', [
            'task' => $task
        ]);

    }

}
