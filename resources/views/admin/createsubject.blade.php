@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('/admin')}}>Create Subject</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    {!! Form::open(['action'=>'ManageSubjectController@store','method'=>'POST']) !!}
    <div class="col-lg-auto">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('subject','Subject :') !!}
                    {!! Form::text('subject',null,['class'=>'form-control','placeholder'=>'Chemistry', "required" ]) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('subject_code','Subject Code :') !!}
                    {!! Form::text('subject_code',null,['class'=>'form-control','placeholder'=>'Eg. CHEM001', "required" ]) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('course_id','Course :') !!}
                    {!! Form::select('course_id',array(null=>'Choose Options')+ $course,null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('unit','Unit') !!}
                    {!! Form::number('unit',null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::submit('Create Subject',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection()