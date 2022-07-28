@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-12">
                        <h3 class="panel-title">All Brands</h3>
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
                                    <th>Name</th>
                                    <th>License Type</th>
                                    <th>License Number</th>
                                    <th>URL's</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>
                                    
                                    @if($brands->count() > 0)

                                        @foreach($brands as $index => $brand)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <img src="{{ $brand->logo }}" class="img-thumbnail" style="width: 25px;height: 25px;">
                                                    {{ $brand->name }}
                                                </td>
                                                <td>{{ $brand->license_type }}</td>
                                                <td>{{ $brand->license_number }}</td>
                                                <td>
                                                    <ul>
                                                        <li><a href="{{ $brand->yt_featured_url }}" target="_blank">Youtube Featured URL</a></li>
                                                        <li><a href="{{ $brand->yt_playlist_url }}" target="_blank">Youtube Playlist URL</a></li>
                                                        <li><a href="{{ $brand->website_url }}" target="_blank">Website URL</a></li>
                                                        <li><a href="{{ $brand->instagram_url }}" target="_blank">Instagram URL</a></li>
                                                        <li><a href="{{ $brand->twitter_url }}" target="_blank">Twitter URL</a></li>
                                                        <li><a href="{{ $brand->facebook_url }}" target="_blank">Facebook URL</a></li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    {{ $brand->latitude }}
                                                </td>
                                                <td>
                                                    {{ $brand->longitude }}
                                                </td>
                                                <td>
                                                    {{ $brand->status }}
                                                </td>
                                                <td>{{ $brand->created_at }}</td>
                                                <td>{{ $brand->updated_at }}</td>
                                            </tr>

                                        @endforeach

                                    @else
                                        <tr>
                                            <td>
                                                No Brands Found!
                                            </td>
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
