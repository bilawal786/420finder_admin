@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Add Delivery Banner</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('delivery-banner.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Banner Text</label>
                                <input type="text" name="content" placeholder="Enter Text" class="form-control" value="{{ $deliveryBanner->content }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
