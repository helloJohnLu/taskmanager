<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 创建项目任务
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
        Task::create([
            'title'         =>  $request->name,
            'project_id'    =>  $request->project_id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task, UpdateTaskRequest $request)
    {
        $task->title = $request->title;
        $task->project_id = $request->projectList;
        $task->update();

        return redirect()->back();
    }

    /**
     * @param Task $task
     * @return
     */
    public function change_completed(Task $task)
    {
        $task->completed === 0 ? $task->completed = 1 : $task->completed = 0;

        $task->save();

        return redirect()->back();
    }

    /**
     * 删除任务
     *
     * @param Task $task
     * @return 上一页
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
