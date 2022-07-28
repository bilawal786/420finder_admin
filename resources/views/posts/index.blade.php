@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Posts</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('createstrainpost') }}" class="btn btn-dark">Add New</a>
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
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>
                                    
                                    @if($posts->count() > 0)

                                        @foreach($posts as $index => $post)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <img src="{{ $post->image }}" style="width: 25px;height: 25px;" class="img-thumbnail"> <br>
                                                    <a href="{{ route('editstrainpost', ['id' => $post->id]) }}">Edit</a> / <a href="{{ route('deletestrain', ['id' => $post->id]) }}" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                                                </td>
                                                <td>{{ $post->description }}</td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>{{ $post->updated_at }}</td>
                                            </tr>

                                        @endforeach

                                    @else
                                        <tr>
                                            <td>No Data Found!</td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endsection