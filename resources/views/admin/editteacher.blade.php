@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('/admin')}}>Create Account</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    {!! Form::model($teacher,['action'=>['ManageProfController@update',$teacher],'method'=>'PATCH','files'=>true]) !!}
    <div class="col-lg-auto">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('name','Name :') !!}
                    {!! Form::hidden('role','teacher',['value'=>'teacher']) !!}
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="form-group">
                    {!! Form::label('mname','Middle Name :') !!}
                    {!! Form::text('mname',null,['class'=>'form-control','placeholder'=>'Middle Name']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('lname','Last Name :') !!}
                    {!! Form::text('lname',null,['class'=>'form-control','placeholder'=>'Last Name']) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('gender','Gender :') !!}
                    {!! Form::select('gender',array('Male'=>'Male','Female'=>'Female'),null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="form-group">
                    {!! Form::label('address','Address :') !!}
                    {!! Form::textarea('address',null,['class'=>'form-control','placeholder'=>'Address','required']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="form-group">
                    {!! Form::label('birthday','Birthday :') !!}
                    {!! Form::date('birthday',null,['class'=>'form-control','placeholder'=>'Birthday']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id','Picture:') !!}
                    {!! Form::file('photo_id',['class'=>'btn']) !!}
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::submit('Update Account',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection()