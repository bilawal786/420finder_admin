<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BrandFeed;

class BrandFeedController extends Controller {
    
    public function index() {

        $feeds = BrandFeed::all();

        return view('brandfeeds.index')
            ->with('feeds', $feeds);

    }

}
