@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Category Types</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('createcategorytype') }}" class="btn btn-dark">Add New</a>
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
                                    
                                    @if($categorytypes->count() > 0)

                                        @foreach($categorytypes as $index => $type)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    {{ $type->name }} <br>
                                                    <a href="{{ route('editcategorytype', ['id' => $type->id]) }}">Edit</a> / <a href="{{ route('deletecategorytype', ['id' => $type->id]) }}" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                                                </td>
                                                <td>{{ $type->created_at->diffForHumans() }}</td>
                                                <td>{{ $type->updated_at->diffForHumans() }}</td>
                                            </tr>

                                        @endforeach

                                    @else
                                        <tr class="text-center">
                                            <td colspan="4">No Category Type Found.</td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="col-md-12">
                        {{ $categorytypes->links() }}
                    </div>

                </div>

            </div>

        </div>

    @endsection
