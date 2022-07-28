@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Strains</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('creategenetic') }}" class="btn btn-dark">Add New</a>
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
                                    
                                    @if($genetics->count() > 0)

                                        @foreach($genetics as $index => $genetic)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    {{ $genetic->name }} <br>
                                                    <a href="{{ route('editgenetic', ['id' => $genetic->id]) }}">Edit</a> / <a href="{{ route('deletegenetic', ['id' => $genetic->id]) }}" onclick="return confirm('Are you sure you want to delete this genetic?');">Delete</a>
                                                </td>
                                                <td>{{ $genetic->created_at }}</td>
                                                <td>{{ $genetic->updated_at }}</td>
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
