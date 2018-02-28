<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    <i class="glyphicon glyphicon-plus"></i> 新建项目
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">创建项目</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'projects.store','method'=>'POST','files'=>'true','id'=>'createProject']) !!}
                    <div class="form-group">
                        {!! Form::label('name', '项目名称', ['class'=>'control-label']) !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>

                    <div>
                        {!! Form::label('thumbnail', '缩略图', ['class'=>'control-label']) !!}
                        {!! Form::file('thumbnail') !!}
                    </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('提交', ['class'=>'btn btn-primary','form'=>'createProject']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>