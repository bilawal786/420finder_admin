<?php

namespace App\Http\Controllers;

use App\Imports\ReviewsImport;
use Carbon\Carbon;

use App\Models\Deal;

use App\Models\User;
use App\Models\Admin;
use App\Models\Business;
use App\Models\DealOrder;
use App\Models\TermOfUse;
use App\Models\RetailOrder;
use Illuminate\Http\Request;
use App\Models\RetailerMenuOrder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Excel;
class AdminController extends Controller {

    public function importer(){
        return view('imprter.index');
    }

    public function importerSave(Request $request){
        $path = $request->file('file');
        $data = Excel::import(new ReviewsImport(), $path);
        return back()->with('success', 'Excel Data Imported successfully.');

    }
    public function login() {

        if(Session::has('admin_id')) {
            return redirect()->route('index');
        } else {
            return view('login');
        }

    }

    public function index() {

        $deals = Deal::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')
        ->groupBy('year','month')
        ->pluck('count')
        ->toArray();

        $chart  =  (new LarapexChart)->lineChart()
                   ->setTitle('Deals')
                   ->setSubtitle('Deals added this year')
                   ->addData('Deals', $deals)
                   ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);

        $customers = User::all()->count();
        $brands = Business::where('business_type', 'Brand')->count();
        $menuSales = RetailerMenuOrder::sum('amount');
        $dealSales = RetailOrder::sum('amount');
        $sales = (int)($menuSales + $dealSales);

        $pieChart = (new LarapexChart)->pieChart()
        ->setTitle('Site Statistics')
        ->setSubtitle('Year 2021.')
        ->addData([count($deals), $brands, $sales])
        ->setLabels(['Deals', 'Brands', 'Sales']);

        return view('index', [
            'deals' => $deals,
            'chart' => $chart,
            'customers' => $customers,
            'brands' => $brands,
            'sales' => $sales,
            'pieChart' => $pieChart
        ]);

    }

    public function checkLogin(Request $request) {

        $admin = Admin::where('email', $request->email)->get();

        if ($admin->count() > 0) {

            $savedpassword = $admin[0]['password'];

            $newpass = $request->password;

            if (\Hash::check($newpass, $savedpassword)) {

                $admin_id = $admin[0]['id'];
                $admin_name = $admin[0]['name'];
                $status = $admin[0]['status'];

                $admin_id = $request->session()->put('admin_id', $admin_id);
                $admin_name = $request->session()->put('admin_name', $admin_name);
                $status = $request->session()->put('status', $status);

                return redirect()->route('index');

            } else {

                return back()->with('error','Password you entered is invalid!');
            }

        } else {

            return back()->with('error','Email you entered is invalid!');

        }

    }

    public function account() {

        $admin = Admin::where('id', session('admin_id'))->first();

        return view('account.index')
            ->with('admin', $admin);

    }

    public function updateaccountdetails(Request $request) {

        $admin = Admin::find(session('admin_id'));

        $admin->name = $request->name;

        $admin->email = $request->email;

        if ($admin->save()) {

            return back()->with('info','Account Details Updated.');

        } else {

            return back()->with('error','Something went wrong. Please try again.');

        }

    }

    public function changeadminpass(Request $request) {

        $admin = Admin::find(session('admin_id'));

        $admin->password = Hash::make($request->password);

        if ($admin->save()) {

            return back()->with('info','Password Updated.');

        } else {

            return back()->with('error','Something went wrong. Please try again.');

        }

    }

    public function logoutadmin() {

        session()->forget('admin_id');
        session()->forget('admin_name');

        return redirect()->route('login');

    }

    public function pages() {

        return view('pages.index');

    }

    public function termsofuse() {

        $terms = TermOfUse::all();

        return view('pages.termsofuse')
            ->with('terms', $terms);

    }

    public function savetermofuse(Request $request) {

        $term = new TermOfUse;

        $term->title = $request->title;

        $term->description = $request->description;

        $term->save();

        return redirect()->back()->with('info', 'Term Created Successfully!');

    }

    public function deletetermofuse($id) {

        $term = TermOfUse::find($id);

        $term->delete();

        return redirect()->back()->with('info', 'Term Deleted Successfully!');

    }

    public function editprivacypolicy() {

        $privacy = Admin::select('privacypolicy')->first();

        return view('pages.editprivacypolicy')
            ->with('privacy', $privacy);

    }

    public function saveprivacypolicy(Request $request) {

        $privacy = Admin::find(1);

        $privacy->privacypolicy = $request->privacypolicy;

        $privacy->save();

        return redirect()->back()->with('info', 'Privacy Policy Saved.');

    }

    public function cookiepolicy(Request $request) {

        $cookie = Admin::select('cookiepolicy')->first();

        return view('pages.cookiepolicy')
            ->with('cookie', $cookie);

    }

    public function savecookiepolicy(Request $request) {

        $cookie = Admin::find(1);

        $cookie->cookiepolicy = $request->cookiepolicy;

        $cookie->save();

        return redirect()->back()->with('info', 'Cookie Policy Saved.');

    }

    public function referralprogram() {

        $refer = Admin::select('referalprogram')->first();

        return view('pages.referralprogram')
            ->with('refer', $refer);

    }

    public function savereferalprogram(Request $request) {

        $referalprogram = Admin::find(1);

        $referalprogram->referalprogram = $request->referalprogram;

        $referalprogram->save();

        return redirect()->back()->with('info', 'Referal Program Saved.');

    }

}
