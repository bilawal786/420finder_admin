@extends('layouts.admin')

    @section('content')
   
        <div class="panel panel-headline">

            <div class="panel-heading">

                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="panel-title">Sub Categories</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('createsubcategory') }}" class="btn btn-dark">Add New</a>
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
                                    <th>Name</th>
                                    <th>Type Name</th>
                                    <th>Parent Sub Category</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </thead>

                                <tbody>
                                    
                                    @if($subcategories->count() > 0)

                                        @foreach($subcategories as $index => $cat)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    {{ $cat->name }} <br>
                                                    <a href="{{ route('editsubcategory', ['id' => $cat->id]) }}">Edit</a> / <a href="{{ route('deletesubcategory', ['id' => $cat->id]) }}" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                                                </td>
                                                <td>
                                                    <?php
                                                        $type = App\Models\CategoryType::where('id', $cat->type_id)->select('name')->first();
                                                        echo $type->name;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if ($cat->parent_id != 0) {
                                                            
                                                            $subcat = App\Models\SubCategory::where('id', $cat->id)->select('name')->first();
                                                            echo "<strong>" . $subcat->name . "</strong>";
                                                            
                                                        } else {

                                                            echo "Not Set.";

                                                        }

                                                    ?>
                                                </td>
                                                <td>{{ $cat->created_at->diffForHumans() }}</td>
                                                <td>{{ $cat->updated_at->diffForHumans() }}</td>
                                            </tr>

                                        @endforeach

                                    @else
                                        <tr class="text-center">
                                            <td colspan="4">No Sub Categories Found.</td>
                                        </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="col-md-12">
                        {{ $subcategories->links() }}
                    </div>

                </div>

            </div>

        </div>

    @endsection
