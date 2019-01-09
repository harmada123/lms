@extends('layouts.pl')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('/admin')}}>Chat Box</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="row">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Sender</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                @if(count($messages) > 0)
                    @foreach($messages as $message )
                        <tbody>

                        <td>{{$message->user->email}}</td>
                        <td><a href={{url('replystd/'.$message->id)}}>{{$message->topic->topic}}</a></td>
                        <td>{{$message->status}}</td>
                        </tbody>
                    @endforeach
                @else
                    No data
                @endif
            </table>

        </div>
        <div>
            {{ $messages->links() }}
        </div>

    </div>

@endsection