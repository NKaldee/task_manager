<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::query();

        if ($request->has('status')) {
            $tasks->where('status', $request->status);
        }

        if ($request->has('assigned_to')) {
            $tasks->where('assigned_to', $request->assigned_to);
        }

        return view('tasks.index', ['tasks' => $tasks->get()]);
    }

    public function create()
{
    $users = User::all(); 
    
    return view('tasks.create', compact('users'));
}

    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'assigned_to' => $request->assigned_to,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit($id)
{
    $task = Task::findOrFail($id);
    $users = User::all(); 

    return view('tasks.edit', compact('task', 'users'));
}

public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'due_date' => 'required|date',
        'status' => 'required|in:pendiente,en progreso,completada',
        'assigned_to' => 'nullable|exists:users,id',
    ]);

    $task->update($validated);

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
}

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function markAsCompleted(Task $task)
    {
        $task->update(['status' => 'completed']);
        return redirect()->route('tasks.index');
    }
}
