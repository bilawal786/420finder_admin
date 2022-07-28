<?php

namespace App\Http\Controllers;

use App\Models\DealSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class DealSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = DealSlide::all();

        return view('dealslides.index')
            ->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'desktop' => 'required',
            'mobile' => 'required',
            'slide_radius' => 'required',
            'url' => 'required'
        ]);

        $dealSlide = new DealSlide;
        $dealSlide->location = $validated['location'];
        $dealSlide->latitude = $validated['latitude'];
        $dealSlide->longitude = $validated['longitude'];

        //Desktop
        $avatar = $request->file('desktop');
        $avatartwo = $request->file('mobile');
        $filename = time() . '.' . $avatar->GetClientOriginalExtension();
        $filenametwo = time() . '.' . $avatartwo->GetClientOriginalExtension();
        $avatar_img = Image::make($avatar);
        $avatar_img_two = Image::make($avatartwo);
        $avatar_img->save(public_path('images/slides/desktop/' . $filename));
        $avatar_img_two->save(public_path('images/slides/mobile/' . $filenametwo));

        $slide = [
            'desktop' => asset("images/slides/desktop/" . $filename),
            'mobile' =>  asset("images/slides/mobile/" . $filenametwo)
        ];

        $dealSlide->slide = json_encode($slide);
        $dealSlide->display_type = 'Desktop';
        $dealSlide->slide_radius = $validated['slide_radius'];
        $dealSlide->url = $validated['url'];
        $dealSlide->save();

        return redirect()->back()->with('info', 'Slide Created.');

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
    public function edit($id)
    {
        $dealSlide = DealSlide::find($id);

        return view('dealslides.edit', [
            'dealSlide' => $dealSlide
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'slide_radius' => 'required',
            'url' => 'required'
        ]);

        $dealSlide = DealSlide::find($id);

        $slide = json_decode($dealSlide->slide);

        //Desktop
        if($request->file('desktop')) {
            $avatar = $request->file('desktop');
            $filename = time() . '.' . $avatar->GetClientOriginalExtension();
            $avatar_img = Image::make($avatar);
            $avatar_img->save(public_path('images/slides/desktop/' . $filename));

            $dexp = explode('/', $slide->desktop);
            $desktopImg = $dexp[count($dexp) - 1];

            if(File::exists(public_path("images/slides/desktop/{$desktopImg}"))) {
                File::delete(public_path("images/slides/desktop/{$desktopImg}"));
            }

            $slide->desktop = asset("images/slides/desktop/" . $filename);

        }
        // Mobile
        if($request->file('mobile')) {
            $avatartwo = $request->file('mobile');
            $filenametwo = time() . '.' . $avatartwo->GetClientOriginalExtension();
            $avatar_img_two = Image::make($avatartwo);
            $avatar_img_two->save(public_path('images/slides/mobile/' . $filenametwo));

            $mexp = explode('/', $slide->mobile);
            $mobileImg = $mexp[count($mexp) - 1];

            if(File::exists(public_path("images/slides/mobile/{$mobileImg}"))) {
                File::delete(public_path("images/slides/mobile/{$mobileImg}"));
            }

            $slide->mobile = asset("images/slides/mobile/" . $filenametwo);

        }

        $dealUpdated = DealSlide::where('id', $id)->update([
            'location' => $validated['location'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'slide' => json_encode($slide),
            'slide_radius' => $validated['slide_radius'],
            'url' => $validated['url']
        ]);

        return redirect()->route('dealslides.index')->with('info', 'Slide Updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dealSlideId)
    {
        $dealSlide = DealSlide::find($dealSlideId);
        $images = json_decode($dealSlide->slide);

        $dexp = explode('/', $images->desktop);
        $desktopImg = $dexp[count($dexp) - 1];

        $mexp = explode('/', $images->mobile);
        $mobileImg = $mexp[count($mexp) - 1];

        if(File::exists(public_path("images/slides/desktop/{$desktopImg}"))) {
            File::delete(public_path("images/slides/desktop/{$desktopImg}"));
        }

        if(File::exists(public_path("images/slides/mobile/{$mobileImg}"))) {
            File::delete(public_path("images/slides/mobile/{$mobileImg}"));
        }

        $dealSlide->delete();

        return redirect()->back()->with('error', 'Slide Removed.');
    }
}
