
@extends('layouts.admin')

@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                <h3 class="panel-title">Deals Transaction</h3>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <th>#</th>
                      <th>Deals Image</th>
                      <th>Deals Title</th>
                      <th>Transaction Id</th>
                      <th>Name On Card</th>
                      <th>Amount</th>
                      <th>Created At</th>
                    </thead>
                    <tbody>

                        @forelse ($dealsTransaction as $deal)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ $deal->picture }}" alt="Deal Image" height="60px" width="60px"></td>
                            <td>{{ $deal->title }}</td>
                            <td>{{ $deal->transaction_id }}</td>
                            <td>{{ $deal->name_on_card }}</td>
                            <td>{{ number_format($deal->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($deal->created_at)->diffForHumans() }}</td>
                        </tr>

                        @empty

                          <tr class="text-center">
                            <td colspan="6">No transactions found.</td>
                          </tr>

                        @endforelse

                    </tbody>
                  </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

