@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Edit Notifications</h3>
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('notifications') }}" class="btn btn-dark">Go Back</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">
                        
                        <form action="{{ route('updatenotification') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $notification->title }}" placeholder="Enter Notification Title" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Image</label><br>
                                <img src="{{ $notification->image }}" class="img-thumbnail" style="height: 50px;width: 50px;margin-bottom: 10px;">
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" placeholder="Write description here..." cols="5" rows="5" required="">{{ $notification->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-dark">Update Notification</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endsection
