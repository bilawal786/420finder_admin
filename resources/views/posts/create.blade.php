@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Create Post</h3>
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
                        
                        <form action="{{ route('savestrainpost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Strain</label>
                                <select name="strain_id" class="form-control selectOne" required="">
                                    @if($strains->count() > 0)
                                        @foreach($strains as $strain)
                                            <option value="{{ $strain->id }}">{{ $strain->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Select Genetic</label>
                                <select name="genetic_id" class="form-control selectTwo" required="">
                                    @if($genetics->count() > 0)
                                        @foreach($genetics as $genetic)
                                            <option value="{{ $genetic->id }}">{{ $genetic->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Select Image</label>
                                <input type="file" name="image" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Write here..." cols="5" rows="5" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark">Create Post</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endsection
