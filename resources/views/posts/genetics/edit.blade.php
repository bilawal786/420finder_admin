@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Edit Genetic</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('genetics') }}" class="btn btn-dark">Go Back</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">
                        
                        <form action="{{ route('updategenetic') }}" method="POST">
                            @csrf
                            <input type="hidden" name="genetic_id" value="{{ $genetic->id }}">
                            <div class="form-group">
                                <label for="">Genetic Name</label>
                                <input type="text" name="name" value="{{ $genetic->name }}" placeholder="Enter Genetic Name" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark">Update Genetic</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endsection
