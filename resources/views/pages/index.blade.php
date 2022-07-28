@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-12">
                        <h3 class="panel-title">Website Pages</h3>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-6">
                        Terms of Use
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('termsofuse') }}" class="btn">Edit</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-6">
                        Privacy Policy
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('editprivacypolicy') }}" class="btn">Edit</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-6">
                        Cookie Policy
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('cookiepolicy') }}" class="btn">Edit</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-6">
                        Referral Program
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('referralprogram') }}" class="btn">Edit</a>
                    </div>

                </div>

            </div>

        </div>

    @endsection
