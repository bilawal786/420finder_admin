<?php

namespace App\Http\Controllers;

use App\Models\DealOrder;
use Illuminate\Http\Request;
use App\Models\RetailerMenuOrder;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
   /*
   *    MENU TRANSACTION
   *
   */

   public function menuTransaction()
   {
       $menuTransaction = RetailerMenuOrder::all();

       return view('transaction.menu')->with('menuTransaction', $menuTransaction);

   }

   /*
   *    DEALS TRANSACTION
   *
   */

   public function dealsTransaction()
   {
       $dealsTransaction = DB::table('deal_orders')
       ->join('deals', 'deals.id', '=', 'deal_orders.deal_id')
       ->get();

       return view('transaction.deals')->with('dealsTransaction', $dealsTransaction);
   }
}


