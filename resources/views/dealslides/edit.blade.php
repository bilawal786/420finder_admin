@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-md-12">
                        <h3 class="panel-title">Deal Slides</h3>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-4">
                        <form action="{{ route('dealslides.update', $dealSlide->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Enter Location</label>
                                <input id="searchTextField" type="text" size="50" placeholder="Enter a location" value="{{ $dealSlide->location }}" class="form-control" autocomplete="on" runat="server" required="" />
                                <input type="hidden" id="city2" name="location" value="{{ $dealSlide->location }}" />
                                <input type="hidden" id="cityLat" name="latitude" value="{{ $dealSlide->latitude }}" />
                                <input type="hidden" id="cityLng" name="longitude" value="{{ $dealSlide->longitude }}" />
                            </div>
                            <div class="form-group">
                                <label for="">Slide Desktop</label>
                                <div style="margin: 1rem 0;">
                                    <img src="{{ json_decode($dealSlide->slide)->desktop }}" alt="Desktop Image" height="60px" width="60px">
                                </div>

                                <input type="file" name="desktop" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Slide Mobile</label>
                               <div style="margin: 1rem 0;">
                                <img src="{{ json_decode($dealSlide->slide)->mobile }}" alt="Mobile Image" height="60px" width="60px">
                               </div>
                                <input type="file" name="mobile" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Slide Radius</label>
                                <input type="number" name="slide_radius" placeholder="Enter Slide Radius" class="form-control" required="" value="{{ $dealSlide->slide_radius }}">
                            </div>
                            <div class="form-group">
                                <label for="">Enter URL</label>
                                <input type="url" name="url" placeholder="Enter URL" class="form-control" required="" value="{{ $dealSlide->url }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark">Update Slide</button>
                            </div>
                        </form>
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
