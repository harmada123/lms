@extends('layouts.pl')
@section('content')
    {!! Form::model($topic,['action'=>['ManageTopicController@update',$topic],'method'=>'PATCH','files'=>true]) !!}
    <div class="col-lg-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('topic','Topic :') !!}
                    {!! Form::text('topic',null,['class'=>'form-control','placeholder'=>'Topic', "required" ]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('description','Description :') !!}
                    {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description', "required" ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('file','Upload File:') !!}
                    {!! Form::file('file',['class'=>'btn']) !!}
                </div>
            </div>

        </div>
        {!! Form::submit('Edit Topic ',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @endsection
