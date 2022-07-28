@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-md-6">
                        <h3 class="panel-title">Top Businesses</h3>

                        <form action="{{ route('businesses.top') }}" method="GET" class="mb-5" enctype="multipart/form-data" id="searchForm">

                            {{-- @csrf --}}

                                {{-- <div class="col-md-12 col-12"> --}}
                                  <div class="form-group pb-3">
                                      {{-- <label for="">Address Line 1</label> --}}
                                      <input id="searchTextField" type="text" name="address_line_1" class="form-control" value="{{ request()->has('location') ? request()->get('location') : '' }}">
                                  </div>
                                {{-- </div> --}}
                                <input type="hidden" id="city2" name="location" />
                                {{-- <div class="col-md-6 col-6"> --}}
                                    {{-- <label for="">Latitude</label> --}}
                                    <input id="cityLat" type="hidden" name="latitude" class="form-control" readonly="">
                                {{-- </div>
                                <div class="col-md-6 col-6">
                                    <label for="">Longitude</label> --}}
                                    <input id="cityLng" type="hidden" name="longitude" class="form-control" readonly="">

                                    @if(request()->has('pp'))
                                        <input type="hidden" name="pp" value="{{ request()->get('pp') }}">
                                    @endif
                                {{-- </div> --}}

                                {{-- <div class="col-12 form-group" style="margin-top: 1rem">
                                  <button type="submit" class="btn appointment-btn w-100" style="margin-left: 0;">Add Business</button>
                                </div> --}}

                              {{-- </div>

                            </div> --}}
                          </form>


                    </div>

                    <div class="col-md-6 text-right top-per-page">
                         <h5>Per Page</h5>
                         <form action="{{ route('businesses.top') }}" method="GET">

                            @if (request()->has('location'))
                            <input id="searchTextField" type="hidden" name="address_line_1" class="form-control" value="{{ request()->get('location') }}">
                            @endif

                            @if (request()->has('location'))
                            <input type="hidden" id="city2" name="location" value="{{ request()->get('location') }}"/>
                            @endif

                            @if(request()->has('latitude'))
                            <input id="cityLat" type="hidden" name="latitude" class="form-control" readonly="" value="{{ request()->get('latitude') }}">
                            @endif

                            @if(request()->has('longitude'))
                            <input id="cityLng" type="hidden" name="longitude" class="form-control" readonly="" value="{{ request()->get('longitude') }}">
                            @endif

                            <select name="pp" id="" onchange="this.form.submit()" class="form-control">
                                <option value="100" @if (request()->has('pp') && request()->get('pp') == 100)
                                    selected
                                @endif>100</option>
                                <option value="150" @if (request()->has('pp') && request()->get('pp') == 150)
                                    selected
                                @endif>150</option>
                                <option value="200" @if (request()->has('pp') && request()->get('pp') == 200)
                                    selected
                                @endif>200</option>
                            </select>

                        </form>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            {{-- <table id="DataTable" class="table table-hover"> --}}
                                <table class="table table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Business Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>City</th>
                                    <th>State / Province</th>
                                    <th>Order</th>
                                    <th>Icon</th>
                                    <th>Top 10 Status</th>
                                    <th>Created At</th>

                                </thead>

                                <tbody>

                                    @forelse ($businesses as $index => $business)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            {{ $business->business_name }} <br>

                                            @if(
                                            request()->has('address_line_1') &&
                                            request()->has('location') &&
                                            request()->has('latitude') &&
                                            request()->has('longitude')
                                             )
                                            <a href="{{ route('editTopBusiness', [
                                              'id' => $business->id,
                                             'address_line_1' => request()->get('address_line_1'),
                                             'location' => request()->get('location'),
                                             'latitude' => request()->get('latitude'),
                                             'longitude' => request()->get('longitude')
                                            ]) }}">Edit</a>
                                            @else
                                            <a href="{{ route('editTopBusiness', [
                                                'id' => $business->id,
                                               'address_line_1' => "",
                                               'location' => "",
                                               'latitude' => "",
                                               'longitude' => ""
                                              ]) }}">Edit</a>
                                            @endif

                                        </td>
                                        <td>{{ $business->phone_number }}</td>
                                        <td>{{ $business->email }}</td>
                                        <td>{{ $business->business_type }}</td>
                                        <td>{{ $business->city }}</td>
                                        <td>{{ $business->state_province }}</td>
                                        <td>
                                            @if (is_null($business->order))
                                                Not Specified
                                            @else
                                                {{ $business->order }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (is_null($business->icon))
                                                Not Specified
                                            @else
                                                <img src="{{ $business->icon }}" alt="Market Icon" height="40px" width="40px">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($business->top_business)
                                                <button type="button" class="btn btn-danger" onclick="removeBusiness('{{ $business->id }}')">
                                                        Remove
                                                </button>
                                            @else

                                            @if(
                                                request()->has('address_line_1') &&
                                                request()->has('location') &&
                                                request()->has('latitude') &&
                                                request()->has('longitude')
                                                 )
                                                <a href="{{ route('editTopBusiness', [
                                                  'id' => $business->id,
                                                 'address_line_1' => request()->get('address_line_1'),
                                                 'location' => request()->get('location'),
                                                 'latitude' => request()->get('latitude'),
                                                 'longitude' => request()->get('longitude')
                                                ]) }}" class="btn btn-primary">Add</a>
                                                @else
                                                <a href="{{ route('editTopBusiness', [
                                                    'id' => $business->id,
                                                   'address_line_1' => "",
                                                   'location' => "",
                                                   'latitude' => "",
                                                   'longitude' => ""
                                                  ]) }}" class="btn btn-primary">Add</a>
                                                @endif

                                            @endif
                                            </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($business->created_at)->diffForHumans() }}</td>
                                    </tr>

                                    @empty
                                    <tr class="text-center">
                                        <td colspan="9">No Business Found.</td>
                                    </tr>
                                    @endforelse

                                </tbody>

                            </table>
                            <div class="pagination">
                                {{ $businesses->withQueryString()->links("pagination::bootstrap-4") }}
                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-md-12">
                        {{ $businesses->links() }}
                    </div> --}}

                </div>

                 <!-- Modal -->
               <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <form action="" method="POST" id="removeBusinessForm">
                        @csrf
                        @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Remove Business</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            Are you sure you want to remove this business?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                            <button type="submit" class="btn btn-primary">Yes, Remove</button>
                        </div>
                    </div>

                    </form>

                </div>
             </div>

             {{-- Modal End --}}

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
                document.getElementById('searchForm').submit();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        function removeBusiness(id) {
            let form = document.getElementById('removeBusinessForm');
            form.action = '/business/remove-top-business/' + id;
            $("#removeModal").modal('show');
        }
    </script>

    @endsection

