@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Website Notifications</h3>
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('createnotification') }}" class="btn btn-dark">Create New</a>
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>
                                    
                                    @if($notifications->count() > 0)

                                        @foreach($notifications as $index => $notification)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <img src="{{ $notification->image }}" class="img-thumbnail" style="width: 25px;height: 25px;">
                                                    {{ $notification->title }}<br>
                                                    <a href="{{ route('editnotification', ['id' => $notification->id]) }}">Edit</a> /  <a href="{{ route('deletenotification', ['id' => $notification->id]) }}" onclick="return confirm('Are you sure you want to delete this notification?');">Delete</a>
                                                </td>
                                                <td>{{ $notification->description }}</td>
                                                <td>
                                                    {{ $notification->created_at }}
                                                </td>
                                                <td>
                                                    {{ $notification->updated_at }}
                                                </td>
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
