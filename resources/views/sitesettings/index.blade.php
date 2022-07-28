@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Site Settings</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.success-error')

                        <form action="{{ route('site-settings.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="settings[title]" placeholder="Enter Title" class="form-control" value="{{ $settings['title'] }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
