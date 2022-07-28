<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;

class BrandsController extends Controller {
    
    public function index() {

        $brands = Brand::all();

        return view('brands.index')
            ->with('brands', $brands);

    }

}
