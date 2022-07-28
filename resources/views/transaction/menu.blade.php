
@extends('layouts.admin')

@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                <h3 class="panel-title">Menu Transactions</h3>
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
                      <th>Transaction Id</th>
                      <th>Name On Card</th>
                      <th>Amount</th>
                      <th>Created At</th>
                    </thead>
                    <tbody>

                        @forelse ($menuTransaction as $menu)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $menu->transaction_id }}</td>
                            <td>{{ $menu->name_on_card }}</td>
                            <td>{{ number_format($menu->amount, 2) }}</td>
                            <td>{{ $menu->created_at->diffForHumans() }}</td>
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

