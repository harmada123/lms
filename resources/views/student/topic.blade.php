@extends('layouts.student')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            Topic :
        </li>
        <li class="breadcrumb-item active">{{$topic->topic}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-7">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Content
            </div>
            <div class="card-body">
                {{$topic->description}}
                <hr>
                <a href="../uploads/{{$topic->upload->file}}">Download</a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Homework
            </div>
            <div class="card-body">
                @if(count($hw) > 0)
                    @foreach($hw as $ass)
                        Title: {{$ass->title}}
                        <br>
                        Question:  {{$ass->question}}
                    @endforeach
                @else
                    No Homework Assigned
                @endif
            </div>
            <div class="card-header">
                <i class="fas fa-assistive-listening-systems"></i>
                Message / Ask Question to PL
            </div>
            <div class="card-body">
                {!! Form::open(['action'=>'StudentController@store','method'=>'POST']) !!}
                    <div class="form-group">
                        {!! Form::hidden('topic_id',$topic->id,['value'=>$topic->id]) !!}
                        {!! Form::textarea('message',null,['class'=>'form-control'])!!}
                        {!! Form::hidden('status','new',['value'=>'new']) !!}
                        {!! Form::hidden('to',$user_id,['value'=>$user_id]) !!}
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
@endsection()