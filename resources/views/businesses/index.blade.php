@extends('layouts.admin')

    @section('content')

        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-md-6">
                        {{-- <h3 class="panel-title">Search For Business</h3>
                         <form action="{{ route("businesses.search") }}" method="POST">

                        </form> --}}
                    </div>

                    <div class="col-md-6 text-right">
                        <a href="{{ route('addnewbusiness') }}" class="btn btn-dark">Add Business</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="panel panel-headline">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive per-page-form-wrapper">
                            <div class="row" style="margin: 1rem 0;">
                                <div class="col-xs-12 col-sm-6">

                                    <form action="{{ route('businesses') }}" method="GET" class="per-page-form">
                                        <h5>Per Page</h5>

                                        @if (request()->has('s'))
                                        <input type="hidden" name="s" value="{{ request()->get('s') }}">
                                        @endif

                                        <select name="pp" id="" onchange="this.form.submit()" class="form-control">
                                            <option value="100" @if (request()->has('pp') && request()->get('pp') == 100)
                                                selected
                                            @endif>100</option>
                                            <option value="150" @if (request()->has('pp') && request()->get('pp') == 150)
                                                selected
                                            @endif>150</option>
                                            <option value="200" @if (request()->has('pp') && request()->get('pp') == 200)
                                                selected
                                            @endif>200</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-xs-12 col-sm-6 b-search-form">
                                    <form action="{{ route('businesses') }}" method="GET">

                                        <input type="text" class="form-control" name="s" placeholder="Search Business" value="{{ request()->has('s') ? request()->get('s') : '' }}" required>

                                        @if (request()->has('pp'))
                                        <input type="hidden" name="pp" value="{{ request()->get('pp') }}">
                                        @endif

                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </form>
                                </div>
                            </div>
                            {{-- <table id="DataTable" class="table table-hover"> --}}
                            <table class="table table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Business Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Approve / Hide </th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>

                                    @if($businesses->count() > 0)

                                        @foreach($businesses as $index => $business)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    {{ $business->business_name }} <br>
                                                    <a href="{{ route('viewbusinessdetails', ['id' => $business->id]) }}">View</a> / <a href="{{ route('editbusiness', ['id' => $business->id]) }}">Edit</a> / <a href="{{ route('deletebusiness', ['id' => $business->id]) }}" onclick="return confirm('Are you sure you want to delete this business?');">Delete</a>

                                                    <a href="{{ route('edit-business-details', $business) }}">
                                                        Edit Details
                                                    </a>

                                                </td>
                                                <td>{{ $business->phone_number }}</td>
                                                <td>{{ $business->email }}</td>
                                                <td>{{ $business->business_type }}</td>
                                                <td>

                                                    @if(!$business->approve)
                                                     <form action="{{ route('business-approve', $business) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-primary">Approve</button>
                                                     </form>
                                                    @else
                                                      <button onClick="hideBusiness({{ $business->id }})" class="btn btn-danger">Hide</button>
                                                    @endif

                                                </td>
                                                <td>{{ $business->created_at }}</td>
                                                <td>{{ $business->updated_at }}</td>
                                            </tr>

                                        @endforeach

                                    @else

                                        <tr>
                                            <td>
                                                No Businesses Found.
                                            </td>
                                        </tr>

                                    @endif

                                </tbody>

                            </table>

                            <div class="pagination">
                                {{ $businesses->withQueryString()->links("pagination::bootstrap-4") }}
                            </div>

                        </div>

                    </div>

                </div>

               <!-- Modal -->
               <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <form action="" method="POST" id="hideBusinessForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hide Business</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to hide this Business?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                            <button type="submit" class="btn btn-primary">Yes, Hide</button>
                        </div>
                    </div>

                    </form>

                </div>
             </div>

            </div>

        </div>

    @endsection

    @push('scripts')
    <script>
         function hideBusiness(id) {
            let form = document.getElementById('hideBusinessForm');
            form.action = '/business/business-hide/' + id;
            $("#removeModal").modal('show');
         }
    </script>
   @endpush

