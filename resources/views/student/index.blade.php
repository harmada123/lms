@extends('layouts.student')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('/admin')}}>Chat Box</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="row">
        <div class="card-body" id="app">
            <chat-app :user="{{auth()->user()}}"></chat-app>
        </div>
    </div>
@endsection