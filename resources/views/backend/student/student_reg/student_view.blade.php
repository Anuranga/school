@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student List</h3>
                                <a href="{{route('student.registration.add')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Add Student</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Id No</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key  => $value)
                                            <tr>
                                                <td width="5%">{{ $key + 1 }}</td>
                                                <td>{{ $value->class_id }}</td>
                                                <td>{{ $value->year_id }}</td>
                                                <td width="25%">
                                                    <a href="{{route('student.year.edit', $year->id)}}" class="btn btn-info">Edit</a>
                                                    <a href="{{route('student.year.delete', $year->id)}}" class="btn btn-info" id="delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

