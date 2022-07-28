<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class DealProductController extends Controller
{
    /*
    *  RETURN ALL DEALS PRODUCTS
    *
    */
    public function index()
    {
        $deals = Deal::join('deal_products', 'deal_products.deal_id', '=', 'deals.id')->get();

        $deals = $deals->groupBy('deal_id');

        return view('deal-products.index', [
            'deals' => $deals
        ]);
    }
}
