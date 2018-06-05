@extends('layouts.app')

@section('content')

    <h1>ID: {{ $task->id }} のタスク編集ページ</h1>

    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">

            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put'])  !!}

            <div class="form-group">
                {!! Form::label('content', 'タスク:') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>
    
            <div class="form-group">
                {!! Form::label('status', '状況:') !!}
                {!! Form::select('status', [
                    '' => '',
                    '完了' => '完了',
                    '進行中' => '進行中',
                    '未着手' => '未着手',
                    '締め切り間近'=>'締め切り間近'], null, ['class' => 'form-control'])!!}
            </div>
    
            <div class="form-group">
                {!! Form::label('importance', '重要度') !!}
                {!! Form::select('importance', [
                    '' => '',
                    '◎' => '◎',
                    '〇' => '〇',
                    '△' => '△',
                    '×' => '×'], null ,['class' => 'form-control'])!!}
            </div>
    
            <div class="form-group">
                <span class="glyphicon glyphicon-calendar"></span>
                {!! Form::label('due', '締め切り:') !!}
                {!! Form::date('due', null, ['class' => 'form-control']) !!}
            </div>


            {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
         </div>
    </div>
@endsection