@extends('layouts.pl')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('/admin')}}>Create Subject</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    {!! Form::open(['action'=>'ManageHomeworkController@store','method'=>'POST']) !!}
    <div class="col-lg-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('title','Title :') !!}
                    {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title', "required" ]) !!}
                    {!! Form::hidden('teacher_id',$id,['value'=>$id]) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('topic_id','Topic: ') !!}
                    {!! Form::select('topic_id',array(null=>'Choose Topic') + $topic,null,['class'=>'form-control','required']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('question','Questions :') !!}
                    {!! Form::textarea('question',null,['class'=>'form-control','placeholder'=>'Question', "required" ]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('file','Upload File:') !!}
                {!! Form::file('file',['class'=>'btn']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::submit('Create Homework',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection()