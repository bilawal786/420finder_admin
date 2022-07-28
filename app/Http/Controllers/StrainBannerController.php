<?php

namespace App\Http\Controllers;

use App\Models\StrainBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class StrainBannerController extends Controller
{
    public function index() {

        $strainBanner = StrainBanner::first();
        return view('strain-banner.index', [
            'strainBanner' => $strainBanner
        ]);
    }

    public function update(Request $request) {

        $validated = $request->validate([
            'strain' => 'required|image'
        ]);

        if($request->hasFile('strain')) {

        $strain = $request->file('strain');

        $filename = time() . '.' . $strain->GetClientOriginalExtension();

        $strainImg = Image::make($strain);

        $strainImg->save(public_path('images/strains/' . $filename));

        $prevImg = StrainBanner::where('id', 1)->pluck('image')->first();

        $updated = StrainBanner::where('id', 1)->update([
            'image' => asset("images/strains/" . $filename)
        ]);

        if($updated) {

            $exp = explode('/', $prevImg);
            $prevImgExp = $exp[count($exp) - 1];

            if(File::exists(public_path('images/strains/' . $prevImgExp))) {
                File::delete(public_path('images/strains/' . $prevImgExp));
            }

            return redirect()->route('strain-banner.index')->with('success', 'Banner updated');

        } else {
            return redirect()->route('strain-banner.index')->with('error', 'Sorry Something went wrong');
        }

        }
    }
}
