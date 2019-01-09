@extends('layouts.pl')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            Topic : {{$messages->topic->topic}}
        </li>

    </ol>
    <div class="row">
        <div class="container">
            <hr>
            <div class="form-group">
                Question :
                {{$messages->message}}
            </div>
            <div class="card-body">
                {!! Form::open(['action'=>'ManageMessageController@store','method'=>'POST']) !!}
                <div class="form-group">
                    {!! Form::hidden('topic_id',$messages->topic_id,['value'=>$messages->topic_id]) !!}
                    {!! Form::hidden('id',$messages->id,['value'=>$messages->id]) !!}
                    {!! Form::textarea('message',null,['class'=>'form-control'])!!}
                    {!! Form::hidden('to',$messages->from,['value'=>$messages->from]) !!}
                    {!! Form::hidden('status','new',['value'=>'new']) !!}
                    {!! Form::hidden('status1','replied',['value'=>'replied']) !!}
                    {!! Form::hidden('from',\Illuminate\Support\Facades\Auth::user()->id,['value'=>\Illuminate\Support\Facades\Auth::user()->id]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('file','File:') !!}
                    {!! Form::file('file',['class'=>'btn']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Ask Question',['class'=>'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close()!!}
            </div>

        </div>
    </div>
@endsection