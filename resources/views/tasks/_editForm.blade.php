<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#editTask{{ $task->id }}">
    <i class="glyphicon glyphicon-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editTask{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="editTask{{ $task->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">编辑任务</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($task, ['route'=>['tasks.update',$task->id],'method'=>'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('title', '任务名称', ['class'=>'control-label']) !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('projectList', '所属项目', ['class'=>'control-label']) !!}
                        {!! Form::select('projectList', $projects, $project->id, ['class'=>'form-control']) !!}
                    </div>

                    <div class="text-right">
                        {!! Form::submit('提交', ['class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>