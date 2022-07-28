<?php

namespace App\Http\Controllers;

use App\Models\DeliveryBanner;
use Illuminate\Http\Request;

class DeliveryBannerController extends Controller
{
    public function index() {

        $deliveryBanner = DeliveryBanner::first();
        return view('delivery-banner.index', [
            'deliveryBanner' => $deliveryBanner
        ]);
    }

    public function update(Request $request) {

        $content = '';

        if(strlen(trim($request->content)) > 0) {
            $content = trim($request->content);
        }

        $updated = DeliveryBanner::where('id', 1)->update([
            'content' => $content
        ]);

        if($updated) {

            if(strlen(trim($request->content)) > 0) {
                return redirect()->route('delivery-banner.index')->with('success', 'Banner added');
            } else {
                return redirect()->route('delivery-banner.index')->with('success', 'Banner removed');
            }

        } else {
            return redirect()->route('delivery-banner.index')->with('error', 'Sorry Something went wrong');
        }
    }
}
