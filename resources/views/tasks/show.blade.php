@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>状況</th>
            <td>{{ $task->status }}</td>
        </tr>
        <?php if($task->status != '完了'): ?>
            <tr>
                <th>重要度</th>
                <td>{{ $task->importance }}</td>
            </tr>
            <tr>
                <th>締め切り</th>
                <td>{{ $task->due }}</td>
            </tr>
        <?php endif; ?>    
    </table>
    
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-default']) !!}
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
 
@endsection