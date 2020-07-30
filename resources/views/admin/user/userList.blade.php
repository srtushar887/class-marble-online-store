@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Users</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>


    <a href="{{route('admin.user.export')}}">

        <button class="btn btn-success">Export Excl</button>
    </a>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User List</h4>
                    <div class="table-responsive">
                        <table class="table mb-0" id="cate">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Company Name</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $cat)
                                <tr>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->user_name}}</td>
                                    <td>{{$cat->email}}</td>
                                    <td>{{$cat->company_name}}</td>
                                    <td>{{$cat->created_at}}</td>
                                    <td>
                                        @if ($cat->account_status == 1)
                                            Disable
                                        @else
                                            Active
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewuser{{$cat->id}}"><i class="fas fa-eye"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteuser{{$cat->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="deleteuser{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">User Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.user.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this user ?
                                                        <input type="hidden" class="form-control" name="user_delete_id" value="{{$cat->id}}">
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


                                <div class="modal fade" id="viewuser{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.user.update')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{$cat->name}}">
                                                        <input type="hidden" class="form-control" name="user_id" value="{{$cat->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>User Name</label>
                                                        <input type="text" class="form-control" name="user_name" value="{{$cat->user_name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{$cat->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control" name="phone" value="{{$cat->phone}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Company</label>
                                                        <input type="text" class="form-control" name="company_name" value="{{$cat->company_name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Whats App</label>
                                                        <input type="text" class="form-control" name="whatapp_ap" value="{{$cat->whatapp_ap}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Skype ID</label>
                                                        <input type="text" class="form-control" name="skype_id" value="{{$cat->skype_id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="text" class="form-control" placeholder="min password 8 character length" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Account Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="2" {{$cat->account_status == 2 ? 'selected' : ''}}>Active</option>
                                                            <option value="1" {{$cat->account_status == 1 ? 'selected' : ''}}>Disable</option>
                                                        </select>
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



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.create')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category_name">
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
