@extends('layouts.admin')

@section('content')

    <div class="panel panel-headline">

        <div class="panel-heading">

            <div class="row">

                <div class="col-md-6">
                    <h3 class="panel-title">Create Importer</h3>
                </div>


            </div>

        </div>

    </div>

    <div class="panel panel-headline">

        <div class="panel-body">

            <div class="row">

                <div class="col-md-12">

                    <form action="{{ route('importer.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file" name="file"  class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark">Import</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
