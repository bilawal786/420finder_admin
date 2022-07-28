<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notifications;

use Image;

class NotificationsController extends Controller {
    
    public function index() {

        $notifications = Notifications::all();

        return view('notifications.index')
            ->with('notifications', $notifications);

    }

    public function create() {

        return view('notifications.create');

    }

    public function save(Request $request) {

        $notification = new Notifications;

        $notification->title = $request->title;


        $avatar = $request->file('image');
        $filename = time() . '.' . $avatar->GetClientOriginalExtension();

        $avatar_img = Image::make($avatar);
        $avatar_img->resize(80,80)->save(public_path('images/notifications/' . $filename));

        $notification->image = asset("images/notifications/" . $filename);


        $notification->description = $request->description;

        $notification->save();

        return redirect()->back()->with('info', 'Notification Created Successfully.');

    }

    public function edit($id) {

        $notification = Notifications::where('id', $id)->first();

        return view('notifications.edit')
            ->with('notification', $notification);

    }

    public function update(Request $request) {

        $notification = Notifications::find($request->notification_id);

        $notification->title = $request->title;

        if($request->hasFile('image')) {

            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->GetClientOriginalExtension();

            $avatar_img = Image::make($avatar);
            $avatar_img->resize(80,80)->save(public_path('images/notifications/' . $filename));

            $notification->image = asset("images/notifications/" . $filename);

        }

        $notification->description = $request->description;

        $notification->save();

        return redirect()->back()->with('info', 'Notification Updated Successfully.');

    }

    public function delete($id) {

        $notification = Notifications::find($id);

        $notification->delete();

        return redirect()->back()->with('info', 'Notification Removed Successfully.');

    }

}
