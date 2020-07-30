@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Job Management</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>



    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createjoib">Create New Job</button>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Job List</h4>
                    <div class="table-responsive">
                        <table class="table mb-0" id="cate">
                            <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Job Experience</th>
                                <th>Job Position</th>
                                <th>Job Skills</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $cat)
                                <tr>
                                    <td>{{$cat->job_title}}</td>
                                    <td>{{$cat->job_exp}}</td>
                                    <td>{{$cat->posistion_number}}</td>
                                    <td>{{$cat->job_skill}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editjob{{$cat->id}}"><i class="fas fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletejob{{$cat->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="deletejob{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.job.delete')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this job ?
                                                        <input type="hidden" class="form-control" name="job_delete_id" value="{{$cat->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="editjob{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.job.update')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Job Title</label>
                                                        <input type="text" class="form-control" name="job_title" value="{{$cat->job_title}}">
                                                        <input type="hidden" class="form-control" name="edit_job_id" value="{{$cat->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Job Experience</label>
                                                        <input type="number" class="form-control" name="job_exp" value="{{$cat->job_exp}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Position Number</label>
                                                        <input type="number" class="form-control" name="posistion_number" value="{{$cat->posistion_number}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Qualification Requirement</label>
                                                        <input type="text" class="form-control" name="job_skill" value="{{$cat->job_skill}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Job Skills</label>
                                                        <textarea type="text" class="form-control" name="job_des">{!! $cat->job_des !!}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->


        <!-- end col -->
    </div>



    <div class="modal fade" id="createjoib" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.job.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" class="form-control" name="job_title">
                        </div>
                        <div class="form-group">
                            <label>Job Experience</label>
                            <input type="number" class="form-control" name="job_exp">
                        </div>
                        <div class="form-group">
                            <label>Position Number</label>
                            <input type="number" class="form-control" name="posistion_number">
                        </div>
                        <div class="form-group">
                            <label>Qualification Requirement</label>
                            <input type="text" class="form-control" name="job_skill">
                        </div>
                        <div class="form-group">
                            <label>Job Skills</label>
                            <textarea type="text" class="form-control" name="job_des"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#cate').DataTable();
        })
    </script>
@stop
