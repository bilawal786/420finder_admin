@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Create Strain</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('strains') }}" class="btn btn-dark">Go Back</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">
                        
                        <form action="{{ route('savestrain') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Strain Name</label>
                                <input type="text" name="name" placeholder="Enter Strain Name" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark">Create Strain</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endsection
