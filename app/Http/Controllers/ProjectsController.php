<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Models\Project;
use App\Repositories\ProjectsRepository;


class ProjectsController extends Controller
{
    protected $repository;

    // 注入
    public function __construct(ProjectsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $this->repository->newProject($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // 获取项目下的任务
        $todo = $project->tasks()->where('completed', 0)->paginate(2);
        $done = $project->tasks()->where('completed', 1)->paginate(2);
        // 获取项目信息，返回数组，name 是值，id 为键
        $projects = $project->pluck('name','id');

        return view('projects.show',compact('project','todo', 'done', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, EditProjectRequest $request)
    {
        $this->repository->updateProject($project, $request);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->repository->delThumbnail($project);

        $project->delete();

        return redirect()->back();
    }
}
