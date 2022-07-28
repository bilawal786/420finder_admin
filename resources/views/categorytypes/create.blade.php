@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Add New Type</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('categorytypes') }}" class="btn btn-dark">Go Back</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('storecategorytype') }}" method="POST">
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
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-control" required="">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Select Type</label>
                                <input type="text" name="name" placeholder="Enter Type name" class="form-control" required="">
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-default">Create Category Type</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
