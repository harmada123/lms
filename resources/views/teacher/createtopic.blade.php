@extends('layouts.pl')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('/teacher')}}>Create Topic</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    {!! Form::open(['action'=>'ManageTopicController@store','method'=>'POST','files'=>true]) !!}
    <div class="col-lg-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('topic','Topic :') !!}
                    {!! Form::text('topic',null,['class'=>'form-control','placeholder'=>'Topic', "required" ]) !!}
                    {!! Form::hidden('subject_id',$sid,['value'=>$sid]) !!}
                    {!! Form::hidden('section_id',$subid,['value'=>$subid]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('description','Description :') !!}
                    {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description', "required" ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('file','Upload File:') !!}
                    {!! Form::file('file',['class'=>'btn']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="course" class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Topic</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
                <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
                <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
                <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
                <script type="text/javascript">
                    $(function() {
                        $('#course').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '/piclms/public/{{$sid}}/getTopic/{{$subid}}',
                            columns : [


                                {data: 'topic',
                                    // "render": function(data, type, row, meta){
                                    //     if(type === 'display'){
                                    //         data = '<a href="' + 'course/'+ row.id +'/edit" >' + data + '</a>';
                                    //     }
                                    //     return data;
                                    // }
                                },

                            ],
                            pageLength: 5,
                        });
                    });
                </script>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::submit('Create Topic ',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection()