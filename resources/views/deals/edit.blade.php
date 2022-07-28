@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Edit Deal</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('deals.index') }}" class="btn btn-dark">Go Back</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ route('deals.update', $deal->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" placeholder="Enter Title" class="form-control" required="" value="{{ $deal->title }}">
                            </div>
                            <div class="form-group">

                              <div class="current-picture" style="margin-bottom: 0.5rem">
                                 <img src="{{ json_decode($deal->picture)[0] }}" alt="Deal Image" height="100px" width="100px">
                              </div>
                              <label for="">Picture</label>
                              <input type="file" name="picture[]" class="form-control" multiple>
                            </div>

                            <div class="form-group">
                                <label for="">Businesses</label>
                                <select name="retailer_id" id="selectedRetailer" class="form-control">
                                    <option selected disabled>Select Retailer</option>
                                    @foreach ($businesses as $business)
                                        <option value="{{ $business->id }}"
                                            @if ($business->id == $deal->retailer_id)
                                                selected
                                            @endif
                                            >
                                            {{ $business->business_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product">Choose Product</label>
                                <select name="product_id" id="product" class="form-control" required>
                                    <option disabled selected>Select Product</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        @if($product->id == $dealProducts->product_id)
                                            selected
                                        @endif
                                        >
                                            {{ $product->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tier">Choose Tier</label>
                                <select name="tier_id" id="tier" class="form-control" required>
                                    <option disabled selected>Choose Duration</option>
                                    <option value="1" @if ($deal->tier_id == 1)
                                        selected
                                    @endif>1 week </option>
                                    <option value="2" @if ($deal->tier_id == 2)
                                        selected
                                    @endif>2 week</option>
                                    <option value="3" @if ($deal->tier_id == 3)
                                        selected
                                    @endif>4 weeks</option>
                                </select>
                              </div>

                            <div class="form-group">
                                <label for="deal_price">Deal Price</label>
                                <input type="number" name="deal_price" id="deal_price" class="form-control" required value="{{ $deal->deal_price }}">
                              </div>

                              <div id="onlinedeal" style="display: none;">
                                <div class="form-group">
                                  <label for="">Coupon Code</label>
                                  <input type="text" name="coupon_code" placeholder="Enter Coupon Code" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Percentage</label>
                                  <input type="number" name="percentage" placeholder="Enter Percentage" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" cols="5" rows="5" placeholder="Enter Details about deal" class="form-control" required="">{{ $deal->description }}</textarea>
                              </div>

                            <div class="form-group">
                              <button class="btn btn-dark btn-block">Update Deal</button>
                            </div>
                          </form>

                    </div>
                </div>
            </div>
        </div>

    @endsection


    @section('scripts')
    <script>
        $(document).ready(function(){

            $('#selectedRetailer').on('change', function() {
            var businessId = $(this).val();

                $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('deal-business-products') }}",
                method:"GET",
                data: {
                business_id: businessId
                },
                success:function(data) {
                    let html = `<option disabled selected>Select Product</option>`;
                    data.products.forEach(item => {
                        html += `<option value='${item.id}'>${item.name}</option>`;
                    });
                    $('#product').html(html);
                 }
                });

            });
        });

    </script>
@endsection

