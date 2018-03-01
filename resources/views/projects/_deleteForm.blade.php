{!! Form::open(['route'=>['projects.destroy',$project->id], 'method'=>'DELETE']) !!}
<button type="submit" class="btn">
    <i class="glyphicon glyphicon-remove"></i>
</button>
{!! Form::close() !!}