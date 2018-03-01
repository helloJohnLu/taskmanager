<div class="modal fade" id="editModal-{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="editModal-{{ $project->id }}">编辑项目</h4>
            </div>
            <div class="modal-body">
                {!! Form::model( $project, ['route'=>['projects.update',$project->id],'method'=>'PATCH','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name', '项目名称', ['class'=>'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div>
                    {!! Form::label('thumbnail', '缩略图', ['class'=>'control-label']) !!}
                    {!! Form::file('thumbnail') !!}
                </div>

                {{-- 错误信息提示 --}}
                <p>
                    @include('common.error')
                </p>

                <div class="modal-footer">
                    {!! Form::submit('提交', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>