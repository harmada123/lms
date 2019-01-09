@extends('layouts.student')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('course/create')}}>Create Course</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="row">
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Course List</div>
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
                                        <th>Subject Under: </th>
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
                        ajax: '/piclms/public//gethwstudent/{{$section}}',
                        columns : [
                            {data: 'topic', name:'topics.topic',
                                "render": function(data, type, row, meta){
                                    if(type === 'display'){
                                        data = '<a href="' + 'checktopic/'+ row.id +'" >' + data + '</a>';
                                    }
                                    return data;
                                }
                            },
                            {data: 'subject', name: 'subjects.subject'},
                        ],
                        pageLength: 5,
                    });
                });
            </script>
        </div>
    </div>
@endsection