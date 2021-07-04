<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    public function listTasks()
    {   
        $tasks = Task::where('done', '=', null)->get();
        $doneTasks = Task::where('done', '=', 1)->get();
        return view('listTask',[
            'tasks' => $tasks,
            'doneTasks' => $doneTasks,
        ]);
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
        
        try {
            $request->validate([
                'user_id' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);

            Task::create($request->all());
            return redirect()->route('listTasks');
       
        } catch (\Exception $exception) {

            return back()->withError($exception->getMessage())->withInput();
        }
  

    }


    public function updateTask(Request $request)
    {   
        try {
            
            $task = Task::find($request->id);
            $task->update($request->all());
            return redirect()->route('listTasks');

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withError($th->getMessage())->withInput();
        }
    }

    public function editTask($id)
    {
        $task = Task::find($id);
        $categories = Category::all();
        return view('editTask', [
            'task' => $task,
            'categories' => $categories
        ]);
    }

    public function detailTask($id)
    {
        $task = Task::find($id);
        return view('detailTask', [
            'task' => $task
        ]);

    }

    public function doneTask(Request $request)
    {    
        try {

            $taskDone = Task::find($request->id);
            $taskDone->update($request->all());
            return redirect()->route('listTasks');

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withError($th->getMessage())->withInput();
        }
  
    }


    public function deleteTask($id)
    {
        $delete = Task::find($id);
        if(!is_null($delete)){
          $delete->delete();
          return redirect()->route('listTasks');
        } 
    }

}
