@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Terms of Use</h3>
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('pages') }}" class="btn btn-dark">Go Back</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="row">
            
            <div class="col-md-3">
                        
                <div class="panel panel-headline">

                    <div class="panel-body">

                        <form action="{{ route('savetermofuse') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" placeholder="Enter Title" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" cols="5" rows="5" placeholder="Write description..." class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

            <div class="col-md-9">
                        
                <div class="panel panel-headline">

                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            
                            <table class="table">
                                
                                <thead>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                </thead>

                                <tbody>
                                    @if($terms->count() > 0)
                                        @foreach($terms as $index => $term)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    {{ $term->title }} <br>
                                                    <a href="{{ route('deletetermofuse', ['id' => $term->id]) }}" onclick="return confirm('Are you sure you want to delete this term?');">Delete</a>
                                                </td>
                                                <td>
                                                    {{ substr($term->description, 0, 100) }}
                                                </td>
                                                <td>
                                                    {{ $term->created_at }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="4">No Terms Found!</td>
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
