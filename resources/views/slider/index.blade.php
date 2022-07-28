@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-md-12">
                        <h3 class="panel-title">Slides</h3>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-4">
                        <form action="{{ route('saveslide') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Location</label>
                                <input id="searchTextField" type="text" size="50" placeholder="Enter a location" class="form-control" autocomplete="on" runat="server" required="" />
                                <input type="hidden" id="city2" name="location" />
                                <input type="hidden" id="cityLat" name="latitude" />
                                <input type="hidden" id="cityLng" name="longitude" />
                            </div>
                            <div class="form-group">
                                <label for="">Slide Desktop</label>
                                <input type="file" name="desktop" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Slide Mobile</label>
                                <input type="file" name="mobile" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Slide Radius</label>
                                <input type="number" name="slide_radius" placeholder="Enter Slide Radius" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Enter URL</label>
                                <input type="url" name="url" placeholder="Enter URL" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark">Create Slide</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-8">

                        <div class="table-responsive">

                            <table id="DataTable" class="table table-hover" style="font-size: 12px;">

                                <thead>
                                    <th>#</th>
                                    <th>Location</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Radius</th>
                                    <th>URL</th>
                                    <th>Desktop Image</th>
                                    <th>Mobile Image</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>

                                    @if($slides->count() > 0)

                                        @foreach($slides as $index => $slide)
                                            <?php
                                               $images = json_decode($slide->slide, true);
                                            ?>
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    {{-- <img src="{{ $slide->slide }}" style="width: 50px;height: 50px;" class="img-thumbnail"> --}}
                                                    {{ $slide->location }}
                                                    <a href="{{ route('deleteslide', ['id' => $slide->id]) }}" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                                                </td>
                                                <td>{{ $slide->latitude }}</td>
                                                <td>{{ $slide->longitude }}</td>
                                                <td>{{ $slide->slide_radius }}</td>
                                                <td>{{ substr($slide->url, 0,20) }}...</td>
                                                <td><img src="{{ $images['desktop'] }}" style="width: 50px;height: 50px;" class="img-thumbnail"></td>
                                                <td>
                                                    <img src="{{ $images['mobile'] }}" style="width: 50px;height: 50px;" class="img-thumbnail">
                                                </td>

                                                {{-- <td>hhhh</td> --}}
                                                <td>{{ $slide->created_at->diffForHumans() }}</td>
                                                <td>{{ $slide->updated_at->diffForHumans() }}</td>
                                            </tr>

                                        @endforeach

                                    @else
                                        <tr class="text-center">
                                            <td colspan="4">No Slide Found.</td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrAR67o9XfYUXH6u66iVXYhqsOzse6Uz8&libraries=places"></script>
    <script>
        function initialize() {
          var input = document.getElementById('searchTextField');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                // console.log(place);
                document.getElementById('city2').value = place.name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    @endsection
