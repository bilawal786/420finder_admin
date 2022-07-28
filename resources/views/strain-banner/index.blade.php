@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Add Strain Banner</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('strain-banner.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Choose Banner</label>
                                <div style="margin: 1rem 0">
                                    <img src="{{ $strainBanner->image }}" alt="Strain Image" width="80px" height="80px">
                                </div>
                                <input type="file" name="strain" class="form-control" id="file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
