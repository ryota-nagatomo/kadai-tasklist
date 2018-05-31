@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>

    <p>タスク: {{ $task->content }}</p>
    <p>状況: {{ $task->status }}</p>
    
    <?php if($task->status != '完了'): ?>
    <p>締め切り: {{ $task->due }}</p>
    <p>重要度: {{ $task->importance }}</p>
    <?php endif; ?>
    
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id]) !!}
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除') !!}
    {!! Form::close() !!}
 
@endsection