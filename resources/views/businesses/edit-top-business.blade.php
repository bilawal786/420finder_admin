@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-md-6">
                        <h3 class="panel-title">Edit Business</h3>
                    </div>

                    {{-- <div class="col-md-6 text-right">
                        <a href="{{ route('businesses.top') }}" class="btn btn-dark">Go Back</a>
                    </div> --}}

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">

                        <form action="{{ route('business.storeTopBusiness') }}" method="POST" class="mb-5" enctype="multipart/form-data">

                          @csrf

                          <input type="hidden" name="business_id" value="{{ $business->id }}">

                          <input type="hidden" value="{{ $address }}" name="address">
                          <input type="hidden" value="{{ $location }}" name="location">
                          <input type="hidden" value="{{ $latitude }}" name="latitude">
                          <input type="hidden" value="{{ $longitude }}" name="longitude">

                          <div class="col-12">
                            <div class="form-group">
                                <label for="">Business Name</label>
                                 <input type="text" name="business_name" value="{{ $business->business_name }}" class="form-control" required>
                            </div>

                          </div>

                          <div class="col-12">
                            <div class="form-group">
                                <label for="">Business Order</label>
                                <select name="business_order" id="" class="form-control" required>
                                    <option disabled>Choose Order</option>
                                    @foreach (range(1, 10) as $index)
                                        <option value="{{ $index }}"
                                            @if ($index == $business->order)
                                                selected
                                            @endif
                                        >{{ $index }}</option>
                                    @endforeach
                                </select>
                            </div>

                          </div>
                          <div class="col-12">
                            <div class="form-group pb-3">
                              <label for="">Icon Image*</label><br>
                              @if (is_null($business->icon))
                                  <p>Icon Not Added Yet</p>
                               @else
                               <h5>Current Icon</h5>
                               <img src="{{ $business->icon }}" style="width: 50px;height: 50px;        margin-bottom: 10px;" class="img-thumbnail">
                              @endif

                              <input type="file" name="profile_picture" class="form-control">

                            </div>
                          </div>

                            <div class="form-group">
                              <button type="submit" class="btn btn-dark" style="margin-left: 0;">Update Top Business</button>
                            </div>
                          </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>


    @endsection
