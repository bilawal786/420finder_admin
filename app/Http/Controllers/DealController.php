<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Deal;
use App\Models\Business;
use App\Models\DealProduct;
use Illuminate\Http\Request;
use App\Models\DeliveryProducts;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deal::orderBy('id', 'desc')->paginate(10);
        return view('deals.index')->with('deals', $deals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businesses = Business::all();

        return view('deals.create')->with('businesses', $businesses);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validated = request()->validate([
                'title' => 'required',
                'retailer_id' => 'required',
                'product_id' => 'required',
                'tier_id' => 'required',
                'description' => 'required',
                'deal_price' => 'required',
            ]);

                $tiers = [1, 2, 3];
                $price = 0;
                $ending_date = "";

                if(!in_array($validated['tier_id'], $tiers)) {
                    return back();
                }

                if($validated['tier_id'] == 1) {

                    $ending_date = Carbon::now()->addDays(7)->format('Y-m-d');
                    $price = 50.00;

                } elseif($validated['tier_id'] == 2) {

                    $ending_date = Carbon::now()->addDays(14)->format('Y-m-d');
                    $price = 80.00;

                } elseif($validated['tier_id'] == 3) {

                    $ending_date = Carbon::now()->addDays(30)->format('Y-m-d');
                    $price = 140.00;

                }

                $starting_date = Carbon::now()->format('Y-m-d');

                $deal = new Deal;

                $deal->retailer_id = $validated['retailer_id'];
                $deal->title = $request->title;

                $picturePaths = [];

                if($request->hasFile('picture')) {

                    $avatars = $request->file('picture');

                    foreach($avatars as $avatar) {
                        $filename = time() . '.' . $avatar->GetClientOriginalExtension();

                        $avatar_img = Image::make($avatar);
                        $avatar_img->resize(373,373)->save(public_path('images/deals/' . $filename));

                        $dealPicture = asset("images/deals/" . $filename);
                        array_push($picturePaths, $dealPicture);
                    }

                }

                $deal->picture = json_encode($picturePaths);
                $deal->coupon_code = $request->coupon_code;
                $deal->percentage = $request->percentage;
                $deal->tier_id = $validated['tier_id'];
                $deal->deal_price = $validated['deal_price'];
                $deal->starting_date = $starting_date;
                $deal->ending_date = $ending_date;
                $deal->description = $request->description;
                $deal->is_paid = 1;
                $deal->is_admin_added = 1;
                $deal->save();

                DealProduct::create([
                    'deal_id' => $deal->id,
                    'product_id' => $validated['product_id']
                ]);

                return redirect()->back()->with('info', 'Deal created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        $businesses = Business::all();
        $products = DeliveryProducts::where('delivery_id', $deal->retailer_id)->get();
        $dealProduct = DealProduct::where('deal_id', $deal->id)->first();

        return view('deals.edit')->with(['businesses' => $businesses, 'deal' => $deal,
        'products' => $products,
        'dealProducts' => $dealProduct
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {

        $validated = request()->validate([
            'title' => 'required',
            'retailer_id' => 'required',
            'product_id' => 'required',
            'tier_id' => 'required',
            'description' => 'required',
            'deal_price' => 'required',
        ]);

        $tiers = [1, 2, 3];
        $price = 0;
        $ending_date = "";

        if(!in_array($validated['tier_id'], $tiers)) {
            return back();
        }

        if($validated['tier_id'] == 1) {

            $ending_date = Carbon::now()->addDays(7)->format('Y-m-d');
            $price = 50.00;

        } elseif($validated['tier_id'] == 2) {

            $ending_date = Carbon::now()->addDays(14)->format('Y-m-d');
            $price = 80.00;

        } elseif($validated['tier_id'] == 3) {

            $ending_date = Carbon::now()->addDays(30)->format('Y-m-d');
            $price = 140.00;

        }

        $deal->retailer_id = $validated['retailer_id'];
        $deal->title = $request->title;

         $picturePaths = [];

                if($request->hasFile('picture')) {

                    $avatars = $request->file('picture');

                    foreach($avatars as $avatar) {
                        $filename = time() . '.' . $avatar->GetClientOriginalExtension();

                        $avatar_img = Image::make($avatar);
                        $avatar_img->resize(373,373)->save(public_path('images/deals/' . $filename));

                        $dealPicture = asset("images/deals/" . $filename);
                        array_push($picturePaths, $dealPicture);
                    }
                $deal->picture = json_encode($picturePaths);
         }


         $deal->coupon_code = $request->coupon_code;
         $deal->percentage = $request->percentage;
         $deal->tier_id = $validated['tier_id'];
         $deal->deal_price = $validated['deal_price'];
         $deal->ending_date = $ending_date;
         $deal->description = $request->description;
         $deal->is_paid = 1;
         $deal->is_admin_added = 1;
         $deal->save();

         $exist = DealProduct::where('deal_id', $deal->id)->where('product_id', $validated['product_id'])->first();

         if(!$exist) {
            DealProduct::where('deal_id', $deal->id)
                    ->where('product_id', $validated['product_id'])
                    ->update([
                   'deal_id' => $deal->id,
                  'product_id' => $validated['product_id']
                  ]);
         }

        return redirect()->back()->with('info', 'Deal updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        $deal = $deal->delete();

        if($deal) {
            return redirect()->route('deals.index')->with('info', 'Deal Deleted.');
        } else {
            return redirect()->route('deals.index')->with('info', 'Sorry Something Went Wrong.');
        }
    }

    /**
     * Show list of all the deals claimed
     *
     */

    public function dealsClaimed() {

        $deals = DB::table('deals_claimeds')
                    ->leftJoin('deals', 'deals_claimeds.deal_id', '=', 'deals.id')
                    ->leftJoin('users', 'deals_claimeds.customer_id', '=', 'users.id')
                    ->orderBy('deals_claimeds.id', 'desc')
                    ->paginate(10);

        return view('deals.claimed')->with('deals', $deals);
    }

    /*
    *  GET ALL PRODUCTS OF BUSINESS
    */

    public function getAllProductsOfBusiness() {

        $businessId = request()->input('business_id');

        $products = DeliveryProducts::where('delivery_id', $businessId)->select('id', 'name')->get();

        return response()->json([
            'products' => $products
        ]);
    }
}
