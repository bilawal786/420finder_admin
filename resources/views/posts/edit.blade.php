@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Edit Post</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('allposts') }}" class="btn btn-dark">Go Back</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">
                        
                        <form action="{{ route('updatestrainpost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <label for="">Select Image</label><br>
                                <img src="{{ $post->image }}" style="width: 100px;height: 100px;margin-bottom: 10px;" class="img-thumbnail">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Write here..." cols="5" rows="5" required="">{{ $post->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark">Update Post</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endsection
