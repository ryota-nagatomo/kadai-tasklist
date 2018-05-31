@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>

    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}

        {!! Form::label('status', '状況:') !!}
        {!! Form::select('status', [
            '' => '',
            '完了' => '完了',
            '進行中' => '進行中',
            '未着手' => '未着手',
            '締め切り間近'=>'締め切り間近'])!!}

        {!! Form::label('importance', '重要度') !!}
        {!! Form::select('importance', [
            '' => '',
            '◎' => '◎',
            '〇' => '〇',
            '△' => '△',
            '×' => '×'])!!}

        {!! Form::label('due', '締め切り:') !!}
        {!! Form::date('due') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}
    
    
@endsection