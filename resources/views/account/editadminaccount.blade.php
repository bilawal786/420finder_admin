@extends('layouts.admin')

    @section('content')
    
		<div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Edit Admin Account</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('adminaccounts') }}" class="btn btn-dark">
                          Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                
                <div class="panel panel-headline">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('updateadminaccount') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="account_id" value="{{ $admin->id }}">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ $admin->name }}" placeholder="Enter Name" class="form-control" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="{{ $admin->email }}" placeholder="Enter Enter" class="form-control" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" name="password" value="" placeholder="Enter Password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">Update Account</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    @endsection
