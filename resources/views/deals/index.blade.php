@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-md-6">
                        <h3 class="panel-title">Deals</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('deals.create') }}" class="btn btn-dark">Add New</a>
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
                                    <th>Picture</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Coupon Code</th>
                                    <th>Percentage</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>

                                        @forelse($deals as $deal)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                   <img src="{{ json_decode($deal->picture)[0] }}" alt="Deal Picture" height="50" width="50">
                                                </td>
                                                <td>
                                                    {{ $deal->title }}
                                                </td>
                                                <td>
                                                    {{  Str::limit($deal->description , 30, ' ...')  }}

                                                </td>
                                                <td>
                                                    {{ $deal->coupon_code }}
                                                </td>
                                                <th>
                                                    {{ $deal->percentage }}
                                                </th>
                                                <td>{{ $deal->created_at->diffForHumans() }}</td>
                                                <td>{{ $deal->updated_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('deals.edit', $deal->id) }}">Edit</a>

                                                    <button type="submit" class="btn btn-sm btn-alt-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" onclick="handleDelete({{ $deal->id }})">
                                                        {{-- <i class="fa fa-fw fa-times"></i> --}}
                                                        Delete
                                                    </button>
                                                </td>
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

               <!-- Modal -->
               <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <form action="" method="POST" id="deleteDealForm">
                        @csrf
                        @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Deal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this Deal?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                            <button type="submit" class="btn btn-primary">Yes, Delete</button>
                        </div>
                    </div>

                    </form>

                </div>
             </div>

             {{-- Modal End --}}

        </div>

    @endsection

@section('scripts')
    <script>
        function handleDelete(id) {
           let form = document.getElementById('deleteDealForm');
           form.action = '/deals/' + id;
           $("#deleteModal").modal('show');
       }
    </script>
 @endsection

