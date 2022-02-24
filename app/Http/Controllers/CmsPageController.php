<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cms;
use Session;

class CmsPageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

    }

    public function displayCmsPages(Request $request, $slug) {
        $user = Auth::user();

        if ($slug == 'login' && $user !== null) {
            return redirect(route('base_url'));
        }

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        $cmsPage = Cms::where('slug', '=', $slug)->where('is_active', '=', 'yes')->first();
        if ($cmsPage === null) 
            abort(404);

        return view('front.pages.cmspage',
            compact(
                'cmsPage',
                'prefix'
            )
        );

    }
}
