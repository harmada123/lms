@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {!! Form::open(['action'=>'RegistrationController@store','method'=>'POST']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'First Name : ') !!}
                        {!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'eg. Michael']) !!}
                        {!! Form::hidden('role','teacher',['value'=>'teacher']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('mname', 'Middle Name : ') !!}
                        {!! Form::text('mname',null,['class'=>'form-control', 'placeholder'=>'eg. Rivera']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('lname', 'Last Name : ') !!}
                        {!! Form::text('lname',null,['class'=>'form-control', 'placeholder'=>'eg. Lascanas']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('gender', 'Gender : ') !!}
                        {!! Form::select('gender',array('Choose Options','Male'=>'Male','Female'=>'Female'),NULL, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address : ') !!}
                        {!! Form::textarea('address',NULL,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','Email or Mobile Number:') !!}
                        {!! Form::text('email',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','Password:') !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <div class='input-group date' id='datepicker'>
                            {!! Form::label('birthday', 'Birthday : ') !!}
                            {!! Form::date('birthday',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Create Account',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection