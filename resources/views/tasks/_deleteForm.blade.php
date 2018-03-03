{!! Form::open(['route'=>['tasks.destroy', $task->id], 'method'=>'DELETE']) !!}
    <button type="submit" class="btn btn-danger">
        <i class="glyphicon glyphicon-remove"></i>
    </button>
{!! Form::close() !!}