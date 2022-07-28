@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-12">
                        <h3 class="panel-title">Brand Feeds</h3>
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
                                    <th>Business Name</th>
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>
                                    
                                    @if($feeds->count() > 0)

                                        @foreach($feeds as $index => $feed)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <?php
                                                        $business = App\Models\Business::where('id', $feed->business_id)->select('business_name')->first();
                                                        echo $business->business_name;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $brand = App\Models\Brand::where('id', $feed->brand_id)->select('name')->first();
                                                        echo $brand->name;
                                                    ?>
                                                </td>
                                                <td>
                                                    <img src="{{ $feed->image }}" class="img-thumbnail" style="width: 25px;height: 25px;">
                                                </td>
                                                <td>
                                                    {{ $feed->description }}
                                                </td>
                                                <td>
                                                    {{ $feed->created_at }}
                                                </td>
                                                <td>
                                                    {{ $feed->updated_at }}
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
