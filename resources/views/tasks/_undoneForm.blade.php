{!! Form::open(['route'=>['tasks.change',$task->id], 'method'=>'PUT']) !!}
    <button type="submit" class="btn btn-danger">
        <i class="glyphicon glyphicon-minus-sign"></i>
    </button>
{!! Form::close() !!}