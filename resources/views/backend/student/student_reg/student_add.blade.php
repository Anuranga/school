@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Student</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                    <form method="post" action="{{route('store.student.year')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">{{--1st row--}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Student Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" id="name" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Farther's Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="fname"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Mother's Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="mname" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{--end col--}}
                                </div>{{--end row--}}

                                <div class="row">{{--2nd row--}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Mobile Number <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="mobile"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Address <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="address"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Gender <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="role" id="gender" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{--end col--}}
                                </div>{{--end 2nd row--}}

                                <div class="row">{{--3rd row--}}

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Religion <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="religion" id="religion" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Religion</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Christan">Christan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Date of Birth <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="dob"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Discount <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{--end col--}}
                                </div>

                                <div class="row">{{--4th row--}}

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Year <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="religion" id="religion" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Year</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Christan">Christan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Class <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="religion" id="religion" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class </option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Christan">Christan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5> Group <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="religion" id="religion" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Group</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Christan">Christan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--end col--}}
                                </div>{{--end 4th row--}}
                            </div>

                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                        </div>
                    </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
    </div>
</div>
@endsection

