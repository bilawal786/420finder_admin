<?php

namespace App\Http\Controllers;

use Image;
use App\Models\User;

use App\Models\Order;
use App\Models\Detail;
use App\Models\Business;
use App\Mail\AccountHidden;
use App\Models\TopBusiness;
use Illuminate\Http\Request;
use App\Mail\AccountApproved;
use App\Models\DeliveryProducts;
use App\Models\DispenseryProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class BusinessController extends Controller {

    public function index() {
        // $businesses = Business::latest()->get();

        $perPage = 100;
        $search = "";

        if(request()->has('s')) {
            $search = request()->get('s');
        }

        if(request()->has('pp')) {
            $perPage = request()->get('pp');
        }

        $businesses = Business::when(!empty($search), function ($q) use ($search) {
            return $q->where('business_name','like', "%$search%");
        })->latest()->paginate($perPage);

        return view('businesses.index')
            ->with('businesses', $businesses);

    }

    public function detail($id) {

        $business = Business::where('id', $id)->first();

        return view('businesses.detail')
            ->with('business', $business);

    }

    public function editbusiness($id) {

        $business = Business::find($id);

        return view('businesses.editbusiness')
            ->with('business', $business);

    }

    public function updatenewbusiness(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        $business = Business::find($request->business_id);

        if(is_null($business)) {
            return redirect()->back();
        }

        $checkIfEmailExists = Business::where('id', '!=', $business->id)->where('email', $validated['email'])->where('business_type', $business->business_type)->count();

        if($checkIfEmailExists) {
            return redirect()->back()->with('error', 'Email already exists');
        }

        $business->first_name = $request->first_name;
        $business->last_name = $request->last_name;
        $business->email = $request->email;
        $business->phone_number = $request->phone_number;
        $business->role = $request->role;
        $business->z_index = $request->zindex;
        $business->business_phone_number = $request->business_phone_number;

        if($request->hasFile('profile_picture')) {

            $avatar = $request->file('profile_picture');
            $filename = time() . '.' . $avatar->GetClientOriginalExtension();

            $avatar_img = Image::make($avatar);
            $avatar_img->resize(222,147)->save(public_path('images/profile/' . $filename));

            $business->profile_picture = asset("images/profile/" . $filename);

        }

        $previousIcon = "";

        if($request->hasFile('custom_icon')) {
            $icon = $request->file('custom_icon');
            $filename = time() . '.' . $icon->GetClientOriginalExtension();

            $icon_img = Image::make($icon);

            $icon_img->save(public_path('images/retailer-icons/' . $filename));

            $previousIcon = $business->custom_icon;

            $business->custom_icon = asset("images/retailer-icons/" . $filename);

        }

        $business->business_name = $request->business_name;
        $business->business_type = $request->business_type;
        $business->country = $request->country;
        $business->address_line_1 = $request->address_line_1;
        $business->address_line_2 = $request->address_line_1;
        $business->latitude = $request->latitude;
        $business->longitude = $request->longitude;
        $business->city = $request->city;
        $business->state_province = $request->state_province;
        $business->postal_code = $request->postal_code;
        $business->website = $request->website;
        $business->license_number = $request->license_number;
        $business->license_type = $request->license_type;
        $business->license_expiration = $request->license_expiration;

        $business->save();

        $exp = explode('/', $previousIcon);
        $expFile = $exp[count($exp) - 1];
        $this->deletePreviousImage(public_path("images/retailer-icons/"), $expFile);

        return redirect()->route('businesses')->with('info', 'Business Updated.');

    }

    public function deletebusiness($id) {

        $business = Business::find($id);

        $businessType = $business->business_type;
        $businessId = $business->id;

        $deleted = $business->delete();

        if($deleted) {
            if($businessType == 'delivery') {
                DeliveryProducts::where('delivery_id', $businessId)->delete();
            } else {
                DispenseryProduct::where('dispensery_id', $businessId)->delete();
            }

            Order::where('retailer_id', $businessId)->delete();
        }

        return redirect()->back()->with('info', 'Business Removed Successfully.');

    }


    public function create() {

        return view('businesses.create');

    }

    public function savenewbusiness(Request $request) {

        $business = new Business;

        $business->first_name = $request->first_name;
        $business->last_name = $request->last_name;
        $business->phone_number = $request->phone_number;
        $business->email = $request->email;
        $business->password = Hash::make($request->password);
        $business->role = $request->role;

        if($request->hasFile('logo')) {

            $avatar = $request->file('profile_picture');
            $filename = time() . '.' . $avatar->GetClientOriginalExtension();

            $avatar_img = Image::make($avatar);
            $avatar_img->resize(222,147)->save(public_path('images/profile/' . $filename));

            $business->profile_picture = asset("images/profile/" . $filename);

        }

        $business->business_name = $request->business_name;
        $business->business_type = $request->business_type;
        $business->country = $request->country;
        $business->address_line_1 = $request->address_line_1;
        $business->address_line_2 = $request->address_line_1;
        $business->latitude = $request->latitude;
        $business->longitude = $request->longitude;
        $business->city = $request->city;
        $business->state_province = $request->state_province;
        $business->postal_code = $request->postal_code;
        $business->website = $request->website;
        $business->license_number = $request->license_number;
        $business->license_type = $request->license_type;
        $business->license_expiration = $request->license_expiration;
        $business->status = 1;

        if ($business->save()) {

          $user = new User;

          $user->name = $request->first_name . ' ' . $request->last_name;

          $user->email = $request->email;

          $user->password = Hash::make($request->password);

          $user->save();

          return redirect()->route('businesses')->with('info', 'Business Added.');

        } else {

          return redirect()->back()->with('error', 'Problem saving your business details.');

        }

    }

    public function removeCustomIcon(Business $business) {

        $previousIcon = $business->custom_icon;
        $exp = explode('/', $previousIcon);
        $expFile = $exp[count($exp) - 1];
        $this->deletePreviousImage(public_path("images/retailer-icons/"), $expFile);

        $updated = $business->update([
            'custom_icon' => NULL
        ]);

        if($updated) {
            return redirect()->back()->with('success', 'Icon Removed');
        } else {
            return redirect()->back()->with('error', 'Sorry something went wrong');
        }

    }

    /*
    *   Approve Business
    *
    */
    public function approveBusiness(Business $business) {

        $updated = $business->update([
            'approve' => 1
        ]);

        if($updated) {

            Mail::to($business->email)->send(new AccountApproved($business));

            return redirect()->back()->with('success', 'Business Approved');

        } else {
            return redirect()->back()->with('error', 'Sorry something went wrong');
        }

    }

    /*
    *   Hide Business
    *
    */
    public function hideBusiness(Business $business) {

        $updated = $business->update([
            'approve' => 0
        ]);

        if($updated) {

            Mail::to($business->email)->send(new AccountHidden($business));

            return redirect()->back()->with('success', 'Business Hidden');
        } else {
            return redirect()->back()->with('error', 'Sorry something went wrong');
        }

    }

    /*
    *   TOP 10 BUSINESSES
    *
    */
    public function topBusinesses(Request $request) {

        $requestData = $request->all();
        $perPage = 100;

        if(array_key_exists('pp', $requestData)) {
            $perPage = $requestData['pp'];
        }

        if(!empty($requestData['latitude']) && !empty($requestData['longitude']) && !empty($requestData['latitude'])) {
            $businesses = DB::table('businesses')
            ->selectRaw("businesses.* ,
             ( 6371000 * acos( cos( radians(?) ) *
               cos( radians( latitude ) )
               * cos( radians( longitude ) - radians(?)
               ) + sin( radians(?) ) *
               sin( radians( latitude ) ) )
             ) AS distance", [$requestData['latitude'], $requestData['longitude'], $requestData['latitude']])
            ->having("distance", "<", 250000)
            ->orderBy('distance', 'asc')
            ->orderBy('order', 'asc')
            ->paginate($perPage);

        } else {
            $businesses = DB::table('businesses')->orderBy('order', 'asc')
            ->paginate($perPage);
        }

        return view('businesses.top-businesses')->with('businesses', $businesses);


    }

    /*
    *  Edit Top Business
    *
    */

    public function editTopBusiness($topBusinessId, $address = "", $location = "", $lat = "", $lng = "")
    {

       $topBusiness = Business::where('id', $topBusinessId)->first();

       return view('businesses.edit-top-business')->with(
           [
            'business' => $topBusiness,
            'address' => $address,
            'location' => $location,
            'latitude' => $lat,
            'longitude' => $lng
           ]);
    }

    /*
    *   STORE BUSINESS
    *
    */
    public function storeTopBusiness(Request $request)
    {
        $validated = $request->validate([
            'business_id' => 'required',
            'business_name' => 'required',
            'business_order' => 'required',
        ]);

        $business = Business::where('id', $validated['business_id'])->first();

        if($business) {

            if($request->hasFile('profile_picture')) {

                $marker = $request->file('profile_picture');
                $filename = time() . '.' . $marker->GetClientOriginalExtension();

                $marker_img = Image::make($marker);
                $marker_img->resize(45,57)->save(public_path('images/top-business/' . $filename));

                $exp = explode('/', $business->icon);
                $expFile = $exp[count($exp) - 1];

                $this->deletePreviousImage(public_path("images/top-business/"), $expFile);

                $updated = $business->update([
                    'order' => $validated['business_order'],
                    'top_business' => 1,
                    'icon' => asset("images/top-business/" . $filename)
                ]);

            } else {

                $updated = $business->update([
                    'order' => $validated['business_order'],
                    'top_business' => 1,
                ]);

            }

            if($updated) {

                if(!empty($request->address) && !empty($request->location) && !empty($request->latitude) && !empty($request->longitude)) {
                    return redirect()->route('businesses.top', [
                        'address_line_1' => $request->address,
                        'location' => $request->location,
                        'latitude' => $request->latitude,
                        'longitude' => $request->longitude
                    ])->with('info', 'Record Updated Successfully');;
                } else {
                    return redirect()->route('businesses.top')->with('info', 'Record Updated Successfully');
                }
            } else {
                return redirect()->back()->with('error', 'Sorry Something Went Wrong.');
            }

        } else {
            return redirect()->back()->with('error', 'Sorry Something Went Wrong.');
        }

    }

    /*
    *  REMOVE BUSINESS FROM TOP 10
    *
    */
    public function removeTopBusiness(Request $request, Business $business) {

        $exp = explode('/', $business->icon);
        $expFile = $exp[count($exp) - 1];
        $this->deletePreviousImage(public_path("images/top-business/"), $expFile);

        $updated = $business->update([
            'top_business' => 0,
            'order' => NULL,
            'icon' => NULL
        ]);

        if($updated) {
            return redirect()->back()->with('info', 'Business Removed From Top 10');
        } else {
            return redirect()->back()->with('error', 'Sorry something went wrong');
        }
    }

    /*
    *   Edit Business Details
    *
    */
    public function editBusinessDetails(Business $business) {

        $detail = Detail::where('business_id', $business->id)->first();

        return view('details.index', [
            'detail' => $detail,
            'business' => $business
        ]);

    }

    public function updateBusinessDetails(Request $request, Business $business) {

        $deliveryDetail = Detail::where('business_id', $business->id)->first();

        // $amenities = [
        //     'brand_verified' => ($request->has('brand_verified')) ? $request->brand_verified : 'off',
        //     'access' => ($request->has('access')) ? $request->access : 'off',
        //     'security' => ($request->has('security')) ? $request->security : 'off',
        // ];

        if(is_null($deliveryDetail)) {
           $created = Detail::create([
                'business_id' => $business->id,
                'introduction' => $request->introduction,
                'about' => $request->about,
              //  'amenities' => json_encode($amenities),
                'amenities' => NULL,
                'customers' => $request->customers,
                'announcement' => $request->announcement,
                'license' => $request->license,
           ]);

            if($created) {
                return back()->with(
                    [ 'info' => 'Detail created Successfully.' ],
                    [ 'detail' => $created]
                );
            } else {
                return back()->with(
                    [ 'error' => 'Sorry something went wrong.' ],
                );
            }
        } else {
            $updated = $deliveryDetail->update([
                'introduction' => $request->introduction,
                'about' => $request->about,
               // 'amenities' => json_encode($amenities),
                'amenities' => NULL,
                'customers' => $request->customers,
                'announcement' => $request->announcement,
                'license' => $request->license,
            ]);

            if($updated) {
                return back()->with(
                    [ 'info' => 'Detail Updated Successfully.' ],
                    [ 'detail' => $updated]
                );
            } else {
                return back()->with(
                    [ 'error' => 'Sorry Something Went Wrong.'],
                    [ 'detail' => $deliveryDetail]
                );
            }
        }
    }

    /*
    *   Delete Previous Image
    */
    private function deletePreviousImage($path, $expFile) {

        $fullPath = $path.'/'.$expFile;

        if($path){
            if (file_exists($fullPath)) {
                \File::delete($fullPath);
            }
        }
    }
}
