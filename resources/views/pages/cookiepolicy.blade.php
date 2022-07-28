@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Edit Cookie Policy</h3>
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('pages') }}" class="btn btn-dark">Go Back</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="{{ route('savecookiepolicy') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Edit Cookie Policy</label>
                                <textarea id="editor1" name="cookiepolicy" id="" cols="5" rows="5" placeholder="Write here..." class="form-control" required="">{{ $cookie->cookiepolicy }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark">Update Cookie</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    @endsection
