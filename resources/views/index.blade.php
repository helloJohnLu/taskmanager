@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($projects)
            @foreach($projects as $project)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">

                        <ul class="icon-bar">
                            <li>
                                @include('projects._deleteForm')
                            </li>
                            <li><i class="glyphicon glyphicon-cog"></i></li>
                        </ul>

                        <a href="{{ route('projects.show', $project->id) }}">
                            <img src="{{ asset('/thumbnails/' . $project->thumbnail) }}" alt="...">
                        </a>
                        <div class="caption">
                            <a href="{{ route('projects.show', $project->id) }}">
                                <h4 class="text-center">{{ $project->name }}</h4>
                            </a>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="col-md-8 col-md-offset-2">
            @include('projects._createProjectModal')
        </div>
    </div>
</div>

@endsection

@section('customJS')
    <script>
        $(document).ready(function () {
            $('.icon-bar').hide();
            $('.thumbnail').hover(function () {
                $(this).find('.icon-bar').toggle();
            });
        });
    </script>
@endsection
