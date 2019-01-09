@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href={{url('section/create')}}>Create Section</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="row">
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Section List</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="course" class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Section</th>
                                        <th>Instructor's Name</th>
                                        <th>Instructor's Last Name</th>
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
                        ajax: '/piclms/public/sectiontable/getsection',
                        columns : [
                            {data: 'id', name: 'sections.id'},
                            {data: 'section', name: 'sections.section',
                                "render": function(data, type, row, meta){
                                    if(type === 'display'){
                                        data = '<a href="' + 'section/'+ row.id +'/edit" >' + data + '</a>';
                                    }
                                    return data;
                                }
                            },
                            {data: 'name', name: 'teachers.name'},
                            {data: 'lname', name: 'teacheers.lname'},
                            // {data: 'name',
                            //
                            // },
                            // {data: 'lname'},
                        ],
                        pageLength: 5,
                    });
                });
            </script>
        </div>
    </div>
@endsection