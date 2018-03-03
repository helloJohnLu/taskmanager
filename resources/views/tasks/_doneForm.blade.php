{!! Form::open(['route'=>['tasks.change',$task->id], 'method'=>'PUT']) !!}
    <button type="submit" class="btn btn-success">
        <i class="glyphicon glyphicon-check"></i>
    </button>
{!! Form::close() !!}