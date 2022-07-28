@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Edit Sub Category</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('categorytypes') }}" class="btn btn-dark">Go Back</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('storesubcategory') }}" method="POST">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="">Select Type</label>
                                <select name="type_id" class="selectOne form-control" required="">
                                    <option value="">Select</option>
                                    @foreach($categorytypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Select Parent</label>
                                <select name="parent_id" class="selectTwo form-control">
                                    <option value="0">Select</option>
                                    @foreach($subcategories as $subcats)
                                        <option value="{{ $subcats->id }}">{{ $subcats->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Sub Category Name</label>
                                <input type="text" name="name" placeholder="Enter Type name" class="form-control" required="">
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-default">Create Sub Category</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
