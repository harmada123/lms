@extends('layouts.pl')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <ol class="breadcrumb">
                Update Credentials
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            {!! Form::model($users,['action'=>['StudentController@update',$users],'method'=>'PATCH','files' => true]) !!}
            <div class="form-group">
                {!! Form::label('email','Email :') !!}
                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'email@pic.edu.ph']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password :') !!}
                {!! Form::password('password',['class'=> 'form-control' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Edit User',['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection