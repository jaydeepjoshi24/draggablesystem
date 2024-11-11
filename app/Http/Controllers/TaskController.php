<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Task;


use Illuminate\Http\Request;

class TaskController extends Controller
{
        public function index()
        {
        $tasks = Task::all();
        $highPriorityTasks = Task::where('task_priority', 'High')->get();
        $mediumPriorityTasks = Task::where('task_priority', 'Medium')->get();
        $lowPriorityTasks = Task::where('task_priority', 'Low')->get();

    return view('tasks.index', compact('highPriorityTasks', 'mediumPriorityTasks', 'lowPriorityTasks'));
        
        }
    
        public function create()
        {
            return view('tasks.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'task_name' => 'required',
                'task_priority' => 'required',
                'task_image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);
    
            $task = new Task();
            $task->task_name = $request->task_name;
            $task->task_description = $request->task_description;
            $task->task_priority = $request->task_priority;
            $task->completed = $request->has('completed') ? true : false;
    
            if ($request->hasFile('task_image')) {
                $imagePath = $request->file('task_image')->store('tasks_images', 'public');
                $task->task_image = $imagePath;
            }
            
    
            $task->save();
    
            return redirect()->route('tasks.index');
        }
    
        public function edit(Task $task)
        {
            return view('tasks.edit', compact('task'));
        }
    
        public function update(Request $request, Task $task)
        {
            $request->validate([
                'task_name' => 'required',
                'task_priority' => 'required',
                'task_image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);
    
            $task->task_name = $request->task_name;
            $task->task_description = $request->task_description;
            $task->task_priority = $request->task_priority;
            $task->completed = $request->has('completed') ? true : false;
    
            if ($request->hasFile('task_image')) {
                if ($task->task_image) {
                    Storage::disk('public')->delete($task->task_image);
                }
    
                $imagePath = $request->file('task_image')->store('tasks_images', 'public');
                $task->task_image = $imagePath;
            }
    
            $task->save();
    
            return redirect()->route('tasks.index');
        }
    
        public function destroy(Task $task)
        {
            if ($task->task_image) {
                Storage::disk('public')->delete($task->task_image);
            }
    
            $task->delete();
    
            return redirect()->route('tasks.index');
        }
}
