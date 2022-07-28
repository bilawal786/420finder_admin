@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Categories</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('createcategory') }}" class="btn btn-dark">Add New</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">
                        
                        <div class="table-responsive">
                            
                            <table id="DataTable" class="table table-hover">
                                
                                <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>
                                    
                                    @if($categories->count() > 0)

                                        @foreach($categories as $index => $category)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <img src="{{ $category->image }}" style="width: 50px;height: 50px;" class="img-thumbnail"> {{ $category->name }} <br>
                                                    <a href="{{ route('editcategory', ['id' => $category->id]) }}">Edit</a> / <a href="{{ route('deletecategory', ['id' => $category->id]) }}" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                                                </td>
                                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                                <td>{{ $category->updated_at->diffForHumans() }}</td>
                                            </tr>

                                        @endforeach

                                    @else
                                        <tr class="text-center">
                                            <td colspan="4">No Categories Found.</td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="col-md-12">
                        {{ $categories->links() }}
                    </div>

                </div>

            </div>

        </div>

    @endsection
