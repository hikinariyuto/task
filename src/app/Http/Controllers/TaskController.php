<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Group;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function task()
    {
        $tasks = Task::with('group')->get();
        $groups = Group::all();

        return view('task', compact('tasks','groups'));
    }

    public function store(TaskRequest $request)
    {
        $task = $request->only(['group_id', 'task']);
        Task::create($task);

        return redirect('/')->with('message', 'タスク追加完了');
    }

    public function update(TaskRequest $request)
    {
    $task = $request->only(['task']);
    Task::find($request->id)->update($task);

    return redirect('/')->with('message', 'タスク更新完了');
    }

    public function destroy(Request $request)
    {
    Task::find($request->id)->delete();
    return redirect('/')->with('message', 'タスク削除完了');
    }

    public function search(Request $request)
    {
    $tasks = Task::with('group')->GroupSearch($request->group_id)->TaskSearch($request->keyword)->get();
    $groups = Group::all();

    return view('task', compact('tasks', 'groups'));
    }

}
