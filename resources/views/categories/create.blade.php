@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Add New Category</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('categories') }}" class="btn btn-dark">Go Back</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('storecategory') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                            
                            @if (count($errors) > 0)

                                <div class="alert alert-danger">

                                    <strong>Whoops!</strong> There were some problems with your input.

                                    <ul>

                                        @foreach ($errors->all() as $error)

                                            <li>{{ $error }}</li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endif
                        
                            <div class="form-group">
                                <label for="">Category</label>
                                <input type="text" name="name" placeholder="Enter Category name" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Picture</label>
                                <input type="file" name="image" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default">Create Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
