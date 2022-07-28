<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;

use Image;

use App\Models\MiddleSlider;

class SliderController extends Controller {

    public function index() {

        $slides = Slider::all();

        return view('slider.index')
            ->with('slides', $slides);
    }

    public function saveslide(Request $request) {

        $slider = new Slider;
        $slider->location = $request->location;
        $slider->latitude = $request->latitude;
        $slider->longitude = $request->longitude;

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

        $slider->slide = json_encode($slide);
        $slider->display_type = 'Desktop';
        $slider->slide_radius = $request->slide_radius;
        $slider->url = $request->url;
        $slider->save();


        // $mobile = new Slider;
        // $mobile->location = $request->location;
        // $mobile->latitude = $request->latitude;
        // $mobile->longitude = $request->longitude;

        //Mobile
        // $avatartwo = $request->file('mobile');
        // $filenametwo = time() . '.' . $avatartwo->GetClientOriginalExtension();
        // $avatar_img_two = Image::make($avatartwo);
        // $avatar_img_two->save(public_path('images/slides/mobile/' . $filenametwo));
        // $mobile->slide = asset("images/slides/mobile/" . $filenametwo);
        // $mobile->display_type = 'Mobile';
        // $mobile->slide_radius = $request->slide_radius;
        // $mobile->url = $request->url;
        // $mobile->save();

        return redirect()->back()->with('info', 'Slide Created.');

    }

    public function deleteslide($id) {

        $slide = Slider::find($id);

        $slide->delete();

        return redirect()->back()->with('error', 'Slide Removed.');

    }

    public function middleslides() {

        $slides = MiddleSlider::all();

        return view('slider.middleslider')
            ->with('slides', $slides);

    }

    public function savemiddleslide(Request $request) {

        $slider = new MiddleSlider;

        $slider->location = $request->location;
        $slider->latitude = $request->latitude;
        $slider->longitude = $request->longitude;
        $avatar = $request->file('desktop');
        $avatar_two = $request->file('mobile');
        $filename = time() . '.' . $avatar->GetClientOriginalExtension();
        $filename_two = time() . '.' . $avatar_two->GetClientOriginalExtension();
        $avatar_img = Image::make($avatar);
        $avatar_img_two = Image::make($avatar_two);
        $avatar_img->save(public_path('images/slides/desktop/' . $filename));
        $avatar_img_two->save(public_path('images/slides/mobile/' . $filename_two));

        $slide = [
            'desktop' => asset("images/slides/desktop/" . $filename),
            'mobile' =>  asset("images/slides/mobile/" . $filename_two)
        ];

        $slider->slide = json_encode($slide);

        $slider->display_type = 'Desktop';
        $slider->slide_radius = $request->slide_radius;
        $slider->url = $request->url;
        $slider->save();

        // $mobile = new MiddleSlider;
        // $mobile->location = $request->location;
        // $mobile->latitude = $request->latitude;
        // $mobile->longitude = $request->longitude;
        // $avatar_two = $request->file('mobile');
        // $filename_two = time() . '.' . $avatar_two->GetClientOriginalExtension();
        // $avatar_img_two = Image::make($avatar_two);
        // $avatar_img_two->save(public_path('images/slides/mobile/' . $filename_two));
        // $mobile->slide = asset("images/slides/mobile/" . $filename_two);
        // $mobile->display_type = 'Mobile';
        // $mobile->slide_radius = $request->slide_radius;
        // $mobile->url = $request->url;
        // $mobile->save();

        return redirect()->back()->with('info', 'Slide Created.');

    }

    public function deletemiddleslide($id) {

        $slide = MiddleSlider::find($id);

        $slide->delete();

        return redirect()->back()->with('error', 'Middle Slide Removed.');

    }

}
