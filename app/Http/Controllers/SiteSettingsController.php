<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    public function index()
    {

       $settings = SiteSetting::where('id', 1)->pluck('settings')->first();

        return view('sitesettings.index', [
            'settings' => $settings
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'settings.title' => 'required',
        ],
        ['settings.title.required' => 'Site title is required']
        );

        $updated = SiteSetting::where('id', 1)->update([
            'settings' => json_encode($validated['settings'])
        ]);

        if($updated) {
            return redirect()->back()->with('success', 'Settings Updated');
        } else {
            return redirect()->back()->with('error', 'Sorry something went wrong');
        }
    }
}
