<?php

namespace App\Http\Controllers;
use App\Models\SiteOption;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class AdminDashboardController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(AdminMiddleware::class);
    }

    public function index(){
        $data = (object) [
            'currency' => SiteOption::where('key', 'site-currency')->first() ?? 'USD'
        ];
        return view('dashboard.admin.index', compact('data'));
    }

    public function settings(){
        $data = (object) [
            'currency' => SiteOption::where('key', 'site-currency')->first() ?? 'USD'
        ];
        return view('dashboard.admin.settings', compact('data'));
    }


    public function activeCoins() {
        return view('dashboard.admin.trade.active-coins');
    }



    /**
     * siteOptions function
     *
     * @param Request $request key
     * @param Request $request value
     * @return void
     */

    public function siteOptions(Request $request){
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);

        $key = $request->key;
        $key = ucfirst(str_replace(' ', ' ', str_replace('-', ' ', $key)));

        // Check if the key 'site-currency' already exists and update it, or create a new entry if it doesn't exist
        SiteOption::updateOrCreate(
            ['key' => $request->key],
            ['value' => $request->value]
        );

        return response()->json(['message' => $key .' updated!']);
    }
}
