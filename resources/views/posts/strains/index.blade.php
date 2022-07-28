@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Strains</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('addstrain') }}" class="btn btn-dark">Add New</a>
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
                                    
                                    @if($strains->count() > 0)

                                        @foreach($strains as $index => $strain)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    {{ $strain->name }} <br>
                                                    <a href="{{ route('editstrain', ['id' => $strain->id]) }}">Edit</a> / <a href="{{ route('deletestrain', ['id' => $strain->id]) }}" onclick="return confirm('Are you sure you want to delete this strain?');">Delete</a>
                                                </td>
                                                <td>{{ $strain->created_at }}</td>
                                                <td>{{ $strain->updated_at }}</td>
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
