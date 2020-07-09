@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Category Management</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>



    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Create New Category</button>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                    <div class="table-responsive">
                        <table class="table mb-0" id="cate">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Is Featured</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cats as $cat)
                            <tr>
                                <td>{{$cat->category_name}}</td>
                                <td><img src="{{asset($cat->cat_image)}}" style="height: 50px;width: 50px;"></td>
                                <td>
                                    @if ($cat->is_featured == 1)
                                        yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editcategory{{$cat->id}}"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletecategory{{$cat->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>



                            <div class="modal fade" id="deletecategory{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.category.delete')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                   are you sure to delete this category ?
                                                    <input type="hidden" class="form-control" name="category_delete_id" value="{{$cat->id}}">
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


                            <div class="modal fade" id="editcategory{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.category.update')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" class="form-control" name="category_name" value="{{$cat->category_name}}">
                                                    <input type="hidden" class="form-control" name="category_edit_id" value="{{$cat->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Category Image</label>
                                                    <br>
                                                    <img src="{{asset($cat->cat_image)}}" style="height: 100px;width: 100px;">
                                                    <input type="file" class="form-control" name="cat_image">
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="is_featured" {{$cat->is_featured == 1 ?'checked' : ''}} value="1">   Is Featured</label>
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
                <form action="{{route('admin.category.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                   <div class="form-group">
                       <label>Category Name</label>
                       <input type="text" class="form-control" name="category_name">
                   </div>
                    <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" class="form-control" name="cat_image">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="is_featured" value="1">   Is Featured</label>
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
