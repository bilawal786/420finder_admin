<?php

namespace App\Imports;

use App\Models\Business;
use App\Models\Detail;
use App\Models\RetailerReview;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class ReviewsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $user = Business::create([
                'business_type' => $row[1],
                'business_name'    => $row[2],
                'email'    => $row[3],
                'website'    => $row[4],
                'phone_number'    => $row[5],
                'address_line_1'    => $row[6],
                'city'    => $row[7],
                'state_province'    => $row[8],
                'postal_code'    => $row[9],
                'profile_picture'    => $row[10],
                'closing_time'    => "18:00",
                'opening_time'    => "9:00",
                'latitude'    => $row[12],
                'longitude'    => $row[13],
                'instagram'    => $row[14],
                'facebook'    => $row[15],
                'twitter'    => $row[16],
                'reviews_count'    => $row[29],
                'rating'    => $row[30],
                'approve'    => "1",
                'introduction'    => $row[111],
                'monday_open'    => $row[112],
                'monday_close'    => $row[113],
                'tuesday_open'    => $row[114],
                'tuesday_close'    => $row[115],
                'wednesday_open'    => $row[116],
                'wednesday_close'    => $row[117],
                'thursday_open'    => $row[118],
                'thursday_close'    => $row[119],
                'friday_open'    => $row[120],
                'friday_close'    => $row[121],
                'saturday_open'    => $row[122],
                'saturday_close'    => $row[123],
                'sunday_open'    => $row[124],
                'sunday_close'    => $row[125],
            ]);
            Detail::create([
                'announcement' => $row[25],
                'about' => $row[26],
                'customers' => $row[27],
                'business_id' => $user->id,
            ]);
            $customer1 = User::create([
                'name' =>  $row[31]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[31].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer1->id,
                'rating' => $row[32],
                'description' => $row[34],
            ]);

            $customer2 = User::create([
                'name' =>  $row[35]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[35].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer2->id,
                'rating' => $row[36],
                'description' => $row[38],
            ]);

            $customer3 = User::create([
                'name' =>  $row[39]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[39].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer3->id,
                'rating' => $row[40],
                'description' => $row[42],
            ]);
            $customer4 = User::create([
                'name' =>  $row[43]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[43].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer4->id,
                'rating' => $row[44],
                'description' => $row[46],
            ]);
            $customer5 = User::create([
                'name' =>  $row[47]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[47].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer5->id,
                'rating' => $row[48],
                'description' => $row[50],
            ]);
            $customer6 = User::create([
                'name' =>  $row[51]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[51].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer6->id,
                'rating' => $row[52],
                'description' => $row[54],
            ]);
            $customer7 = User::create([
                'name' =>  $row[55]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[55].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer7->id,
                'rating' => $row[56],
                'description' => $row[58],
            ]);
            $customer8 = User::create([
                'name' =>  $row[59]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[59].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer8->id,
                'rating' => $row[60],
                'description' => $row[62],
            ]);
            $customer9 = User::create([
                'name' =>  $row[63]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[63].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer9->id,
                'rating' => $row[64],
                'description' => $row[66],
            ]);
            $customer10 = User::create([
                'name' =>  $row[67]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[67].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer10->id,
                'rating' => $row[68],
                'description' => $row[70],
            ]);
            $customer11 = User::create([
                'name' =>  $row[71]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[71].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer11->id,
                'rating' => $row[72],
                'description' => $row[74],
            ]);
            $customer12 = User::create([
                'name' =>  $row[75]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[75].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer12->id,
                'rating' => $row[76],
                'description' => $row[78],
            ]);
            $customer13 = User::create([
                'name' =>  $row[79]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[79].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer13->id,
                'rating' => $row[80],
                'description' => $row[82],
            ]);
            $customer14 = User::create([
                'name' =>  $row[83]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[83].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer14->id,
                'rating' => $row[84],
                'description' => $row[86],
            ]);
            $customer15 = User::create([
                'name' =>  $row[87]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[87].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer15->id,
                'rating' => $row[88],
                'description' => $row[90],
            ]);
            $customer16 = User::create([
                'name' =>  $row[91]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[91].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer16->id,
                'rating' => $row[92],
                'description' => $row[94],
            ]);
            $customer17 = User::create([
                'name' =>  $row[95]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[95].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer17->id,
                'rating' => $row[96],
                'description' => $row[98],
            ]);
            $customer18 = User::create([
                'name' =>  $row[99]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[99].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer18->id,
                'rating' => $row[100],
                'description' => $row[102],
            ]);
            $customer19 = User::create([
                'name' =>  $row[103]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[103].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer19->id,
                'rating' => $row[104],
                'description' => $row[106],
            ]);
            $customer20 = User::create([
                'name' =>  $row[107]??"Customer".rand(1083645384, 8346734093403489).Str::random(5),
                'email' =>  $row[107].rand(1083645384, 8346734093403489)."@gmail.com",
                'password' => '12345678'
            ]);
            RetailerReview::create([
                'retailer_id' => $user->id,
                'customer_id' => $customer20->id,
                'rating' => $row[108],
                'description' => $row[110],
            ]);
//            $customer21 = User::create([
//                'name' =>  $row[111],
//                'email' =>  $row[111].rand(1083645384, 8346734093403489)."@gmail.com",
//                'password' => '12345678'
//            ]);
//            RetailerReview::create([
//                'retailer_id' => $user->id,
//                'customer_id' => $customer21->id,
//                'rating' => $row[112],
//                'description' => $row[114],
//            ]);

        }
    }
}
