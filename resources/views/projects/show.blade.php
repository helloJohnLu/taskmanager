@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#todo" aria-controls="profile" role="tab" data-toggle="tab">待处理</a>
            </li>
            <li role="presentation">
                <a href="#done" aria-controls="messages" role="tab" data-toggle="tab">已处理</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            {{-- 未完成任务列表 --}}
            <div role="tabpanel" class="tab-pane active" id="todo">
                <table class="table table-hover">
                    @foreach($todo as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>@include('tasks._doneForm')</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{-- 已处理任务列表 --}}
            <div role="tabpanel" class="tab-pane" id="done">
                <table class="table table-hover">
                    @foreach($done as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>@include('tasks._undoneForm')</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        @include('tasks._createForm')
    </div>
@stop