@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('/admin')}}>Create Section</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    {!! Form::open(['action'=>'ManageSectionController@store','method'=>'POST']) !!}
    <div class="col-lg-auto">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('section','Section :') !!}
                    {!! Form::text('section',null,['class'=>'form-control','placeholder'=>'Section']) !!}
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="form-group">
                    {!! Form::label('course_id','Course :') !!}
                    {!! Form::select('course_id',array('Choose Course')+ $course, null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('location','Location :') !!}
                    {!! Form::text('location',null,['class'=>'form-control','placeholder'=>'Eg. Mindoro']) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('teacher_id','PL Adviser :') !!}
                    <select name="teacher_id"  id='teacher' class="form-control" required>
                        <option value="">Choose PL</option>
                        @foreach($teacher as $teach)
                            <option value="{{ $teach->id }}">{{ $teach->name}} - {{ $teach->lname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::submit('Create Section',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection()