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
                            <li>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editModal-{{ $project->id }}">
                                    <i class="glyphicon glyphicon-cog"></i>
                                </button>
                            </li>
                        </ul>

                        <a href="{{ route('projects.show', $project->id) }}">
                            <img src="{{ asset('/thumbnails/' . $project->thumbnail) }}" alt="...">
                        </a>
                        <div class="caption">
                            <a href="{{ route('projects.show', $project->id) }}">
                                <h4 class="text-center">{{ $project->name }}</h4>
                            </a>
                        </div>
                    </div>

                    @include('projects._editProjectModal')

                </div>
            @endforeach
        @endif
        <div class="row">
            <div class="project-modal col-sm-6 col-md-3">
                @include('projects._createProjectModal')
            </div>
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
