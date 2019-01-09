@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('/admin')}}>Create Course</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    {!! Form::model($course,['action'=>['ManageCourseController@update',$course],'method'=>'PATCH']) !!}
    <div class="col-lg-auto">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('course','Course :') !!}
                    {!! Form::text('course',null,['class'=>'form-control','placeholder'=>'Course', "required" ]) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('course_code','Course Code :') !!}
                    {!! Form::text('course_code',null,['class'=>'form-control','placeholder'=>'Eg. BSIT', "required" ]) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('degree','Degree :') !!}
                    {!! Form::select('degree',array(null=>'Choose Options','Bachelors'=>'Bachelors','Masteral'=>'Masteral','Doctors'=>'Doctors'),null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('major','Major in:') !!}
                    {!! Form::text('major',null,['class'=>'form-control','placeholder'=>'Eg. Major in Education']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::submit('Update Course',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection()