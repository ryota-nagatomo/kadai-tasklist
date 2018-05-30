@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} のタスク編集ページ</h1>

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}
        
        {!! Form::label('status', '状況:') !!}
        {!! Form::select('status', [
            '' => '',
            '完了' => '完了',
            '進行中' => '進行中',
            '未着手' => '未着手',
            '締め切り間近'=>'締め切り間近'])!!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection