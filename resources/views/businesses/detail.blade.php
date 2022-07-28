@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">"{{ $business->business_name }}" Details</h3>
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('businesses') }}" class="btn btn-dark">Go Back</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">
                        
                        <div class="table-responsive">
                            
                            <table class="table table-hover">
                                
                                <tbody>
                                    
                                    <tr>
                                        <td><strong>First Name</strong></td>
                                        <td>{{ $business->first_name }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Last Name</strong></td>
                                        <td>{{ $business->last_name }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Phone Number</strong></td>
                                        <td>{{ $business->phone_number }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>{{ $business->email }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Role</strong></td>
                                        <td>{{ $business->role }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Profile Picture</strong></td>
                                        <td>
                                            <img src="{{ $business->profile_picture }}" alt="">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Business Name</strong></td>
                                        <td>
                                            {{ $business->business_name }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Business Type</strong></td>
                                        <td>
                                            {{ $business->business_type }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Country</strong></td>
                                        <td>
                                            {{ $business->country }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Address Line 1</strong></td>
                                        <td>
                                            {{ $business->address_line_1 }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Address Line 2</strong></td>
                                        <td>
                                            {{ $business->address_line_2 }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>City</strong></td>
                                        <td>
                                            {{ $business->city }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>State / Province</strong></td>
                                        <td>
                                            {{ $business->state_province }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Postal Code</strong></td>
                                        <td>
                                            {{ $business->postal_code }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Opening Time</strong></td>
                                        <td>
                                            {{ $business->opening_time }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Closing Time</strong></td>
                                        <td>
                                            {{ $business->closing_time }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Latitude</strong></td>
                                        <td>
                                            {{ $business->latitude }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Longitude</strong></td>
                                        <td>
                                            {{ $business->longitude }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Website</strong></td>
                                        <td>
                                            {{ $business->website }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>License Number</strong></td>
                                        <td>
                                            {{ $business->license_number }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>License Type</strong></td>
                                        <td>
                                            {{ $business->license_type }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>License Expiration</strong></td>
                                        <td>
                                            {{ $business->license_expiration }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Order Online</strong></td>
                                        <td>
                                            @if($business->order_online == 0)
                                                false
                                            @else
                                                true
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Delivery</strong></td>
                                        <td>
                                            @if($business->delivery == 0)
                                                false
                                            @else
                                                true
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Status</strong></td>
                                        <td>
                                            @if($business->status == 0)
                                                Unpublished
                                            @else
                                                Published
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endsection
