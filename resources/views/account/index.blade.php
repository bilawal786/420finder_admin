@extends('layouts.admin')

    @section('content')
   
		<div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title">Edit Account</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="panel-title">Change Password</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('changeadminpass') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="text" name="password" placeholder="Enter New Password" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-default">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="panel-title">Account Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('updateaccountdetails') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ $admin->name }}" placeholder="Enter Name" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="{{ $admin->email }}" placeholder="Enter Email" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-default">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endsection
