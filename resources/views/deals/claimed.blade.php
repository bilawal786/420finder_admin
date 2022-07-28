@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-md-6">
                        <h3 class="panel-title">Deals Claimed</h3>
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
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Picture</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Percentage</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>

                                        @forelse($deals as $deal)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $deal->name }}</td>
                                                <td>{{ $deal->email }}</td>
                                                <td>
                                                   <img src="{{ $deal->picture }}" alt="Deal Picture" height="50" width="50">
                                                </td>
                                                <td>
                                                    {{ $deal->title }}
                                                </td>
                                                <td>
                                                    {{  Str::limit($deal->description , 30, ' ...')  }}
                                                </td>
                                                <th>
                                                    {{ $deal->percentage }}
                                                </th>
                                                <td>{{ \Carbon\Carbon::parse($deal->created_at)->diffForHumans() }}</td>
                                                <td>{{ \Carbon\Carbon::parse($deal->updated_at)->diffForHumans() }}</td>
                                            </tr>

                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="4">No Deals Found.</td>
                                                </tr>
                                            @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="col-md-12">
                        {{ $deals->links() }}
                    </div>

                </div>

            </div>

        </div>

    @endsection
