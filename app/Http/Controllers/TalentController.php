<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Talents;
use Session;

class TalentController extends Controller
{
    public function __construct() {

    }

    public function index() {

    }

    public function viewFindTalent () {
        $page_title = 'MPL - Find Talents';
        $meta_title = 'MPL - Find Talents';
        $meta_keyword = 'MPL, Marcketin, Production, Talents, find, clients';
        $meta_description = 'MPL - Marketing and Production Limited ... ';
        $page_sub_title = 'Find';
        $page_sub_group = 'Talents';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        $categories = DB::table('categories')
            ->leftJoin('ftpages', 'categories.id', '=', 'ftpages.cat_id')
            ->select(
                'categories.id as id',
                'categories.name as name',
                DB::raw("group_concat(ftpages.path SEPARATOR ',') as photo_paths"),
                DB::raw("group_concat(ftpages.selected SEPARATOR ',') as photo_selected"),
            )
            ->where('categories.permission', '=', 'yes')
            ->groupBy('categories.id')
            ->orderBy('categories.id')
            ->get();

        return view('front.pages.findTalents',
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'categories',
                'prefix'
            )
        );
    }

    public function listTalentsByCategory(Request $request) {

        $data = $request->all();

        $cat_id = $data['cat_id'];
        $keyword = $data['keyword'];
        $page = $data['page'];

        $talentsPerPage = 12;

        if ( $keyword === null || $keyword === nudefined || $keyword == '') $keyword = '%';
        else $keyword = '%' . $keyword . '%';

        $talents = DB::table('talents')
            ->leftJoin('users', 'talents.user_id', '=', 'users.id')
            ->leftJoin('categories', 'talents.cat_id', '=', 'categories.id')
            ->leftJoin('photos', 'users.id', '=', 'photos.user_id')
            ->select(
                'talents.id as id',
                'users.name as name',
                'talents.user_id as user_id',
                'categories.name as category',
                'talents.job_reference as job_reference',
                DB::raw("group_concat(photos.id SEPARATOR ',') as photo_ids"),
                DB::raw("group_concat(photos.path SEPARATOR ',') as photo_paths"),
                DB::raw("group_concat(photos.permission SEPARATOR ',') as photo_permissions"),
            )
            ->where('talents.cat_id', '=', $cat_id)
            ->where('talents.permission', '=', 'yes')
            ->where( function($query) use ($keyword) {
                $query->where('users.name', 'LIKE', $keyword)
                    ->orWhere('talents.job_reference', 'LIKE', $keyword);
            })
            ->groupBy('talents.id')
            ->orderBy('talents.id')
            ->offset(($page - 1) * $talentsPerPage )
            ->limit($talentsPerPage)
            ->get();
        $cat_name = DB::table('categories')->where('id', '=', $cat_id)->first()->name;
        $page_title = 'MPL - ' . $cat_name;
        $meta_title = 'MPL - ' . $cat_name;
        $meta_keyword = 'MPL, Marcketin, Production, Talents, Find, clients, Category';
        $meta_description = 'MPL - Marketing and Production Limited ... ';
        $page_sub_title = 'Find By Category';
        $page_sub_group = 'Talents';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        $categories = DB::table('categories')
            ->where('permission', '=', 'yes')
            ->get();

        // begin::get path of photos of  every talents
        $default_path = asset('assets/front/images/default.jpg');

        $lp = 0;
        $path = [];
        if (isset($talents) && ( count($talents) > 0 ) ) {
            foreach($talents as $talent) {      
                $photo_path = "";
                $photo_ids = $talent->photo_ids;
                $photo_paths = $talent->photo_paths;
                $photo_permissions = $talent->photo_permissions;

                if ( isset($photo_ids) ) {
                    $idArray = explode(',', $photo_ids);
                    $pathArray = explode(',', $photo_paths);
                    $permissonArray = explode(',', $photo_permissions);
                    $k = -1;
                    for ( $i = 0; $i < count( $idArray ); $i++ ) {
                        if ( $permissonArray[$i] == 'yes' ) {
                            $k = $i;
                            break;
                        }
                    }
                    if ( $k == -1 ) {   // have photos , but all of photos are  not allowed 
                        $photo_path = $default_path;  
                    } else {
                        $photo_path = route('base_url') . '/' . $pathArray[$k]; 
                    }

                } else {            // have no photo
                    $photo_path =  $default_path;
                }
                $path[] =  $photo_path;
                $lp++;
            }
            $lp = 0;
        }

        // end::get path of photos of  every talents

        return view('front.pages.findTalentsByCategory',
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'talents',
                'prefix',
                'cat_name',
                'categories',
                'talentsPerPage',
                'path'
            )
        );
    }

    public function searchTalents(Request $request) {
        $data = $request->all();

        $cat_id = $data['cat_id'];
        $keyword = $data['keyword'];
        $page = $data['page'];

        $talentsPerPage = 12;

        if ($keyword == '') $keyword = '%';
        else $keyword = '%' . $keyword . '%';

        $talents = DB::table('talents')
            ->leftJoin('users', 'talents.user_id', '=', 'users.id')
            ->leftJoin('categories', 'talents.cat_id', '=', 'categories.id')
            ->leftJoin('photos', 'users.id', '=', 'photos.user_id')
            ->select(
                'talents.id as id',
                'users.name as name',
                'talents.user_id as user_id',
                'categories.name as category',
                'talents.job_reference as job_reference',
                DB::raw("group_concat(photos.id SEPARATOR ',') as photo_ids"),
                DB::raw("group_concat(photos.path SEPARATOR ',') as photo_paths"),
                DB::raw("group_concat(photos.permission SEPARATOR ',') as photo_permissions"),
            )
            ->where('talents.cat_id', '=', $cat_id)
            ->where('talents.permission', '=', 'yes')
            ->where( function($query) use ($keyword) {
                $query->where('users.name', 'LIKE', $keyword)
                    ->orWhere('talents.job_reference', 'LIKE', $keyword);
            })
            ->groupBy('talents.id')
            ->orderBy('talents.id')
            ->offset(($page - 1) * $talentsPerPage )
            ->limit($talentsPerPage)
            ->get();

        // begin::get path of photos of  every talents
        $default_path = asset('assets/front/images/default.jpg');

        $lp = 0;
        $path = [];
        if (isset($talents) && ( count($talents) > 0 ) ) {
            foreach($talents as $talent) {      
                $photo_path = "";
                $photo_ids = $talent->photo_ids;
                $photo_paths = $talent->photo_paths;
                $photo_permissions = $talent->photo_permissions;

                if ( isset($photo_ids) ) {
                    $idArray = explode(',', $photo_ids);
                    $pathArray = explode(',', $photo_paths);
                    $permissonArray = explode(',', $photo_permissions);
                    $k = -1;
                    for ( $i = 0; $i < count( $idArray ); $i++ ) {
                        if ( $permissonArray[$i] == 'yes' ) {
                            $k = $i;
                            break;
                        }
                    }
                    if ( $k == -1 ) {   // have photos , but all of photos are  not allowed 
                        $photo_path = $default_path;  
                    } else {
                        $photo_path = route('base_url') . '/' . $pathArray[$k]; 
                    }

                } else {            // have no photo
                    $photo_path =  $default_path;
                }
                $path[] =  $photo_path;
                $lp++;
            }
            $lp = 0;
        }

        // end::get path of photos of  every talents

        $data = [
            'status' => 'success',
            'data' => $talents,
            'paths' => $path
        ];

        echo json_encode($data);
        return;
    }

    public function viewTalentDetail(Request $request) {
        $data = $request->all();
        $talent_id = $data['id'];

        $talent_detail_info = DB::table('talents')
            ->leftJoin('users', 'talents.user_id', '=', 'users.id')
            ->leftJoin('categories', 'talents.cat_id', '=', 'categories.id')
            ->leftJoin('photos', 'users.id', '=', 'photos.user_id')
            ->select(
                'talents.*',
                'users.name as name',
                'users.email as email',
                'categories.name as category'
            )
            ->where('talents.id', '=', $talent_id)
            ->where('categories.permission', '=', 'yes')
            ->first();
        $user_id = DB::table('users')
                ->leftJoin('talents', 'talents.user_id', '=', 'users.id')
                ->select('users.id as id')
                ->where('talents.id', '=', $talent_id)
                ->first()
                ->id;
        $talent_photos = DB::table('photos')
            ->where('user_id', '=', $user_id)
            ->where('permission', '=', 'yes')
            ->get();

        $page_title = 'MPL - Talent - ' . $talent_detail_info->name;
        $meta_title = 'MPL - Talent - ' . $talent_detail_info->name;
        $meta_keyword = 'MPL, Marcketin, Production, Talents, Find, clients, Category, Talent info, detail info';
        $meta_description = 'MPL - Marketing and Production Limited ... ';
        $page_sub_title = 'Talents detail';
        $page_sub_group = 'Talents';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        return view('front.pages.talentdetail',
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'prefix',
                'talent_detail_info',
                'talent_photos'
            )
        );
    }

    public function uploadTalentPhoto (Request $request) {
        $data = $request->only('user_id');
        $photo = $request->file('file');
        $photoName = time().$photo->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads/photos', $photoName, 'public');

        DB::table('photos')
            ->insert([
                'user_id' => $data['user_id'],
                'path' => "storage/" . $path
            ]);

        $data = [
            'status' => 'success',
            'message' => $mediaName
        ];
        echo json_encode($data);
    }

    public function deleteUploadedPhoto (Request $request) {

        // $data = $request->all();
        // $id = $data['id'];

        // $path = public_path() . '/' . DB::table('photos')::where('id', '=', $id)->first()->path;

        // if ( file_exists($path) ) {
        //     @unlink($path);
        //     Ftpages::where('id', '=', $id)->delete();
        //     $data = [
        //         'status' => 'success',
        //         'message' => 'Image deleted successfully!'
        //     ];
        // } else {
        //     $data = [
        //         'status' => 'failed',
        //         'message' => 'File does not exist'
        //     ];
        // }

        // echo json_encode($data);
    }

}











/*  how to get usable path in client side with return data of 
    searchTalent function ,
    listTalentsByCategory ,
    getTalentDetailInfo functions */
/*
$photo_path = "";
$photo_ids_str = $search_result[1]->photo_ids;
$photo_paths_str = $search_result[1]->photo_paths;
$photo_permissions_str = $search_result[1]->photo_permissions;
if ( isset($photo_ids_str) ) {
    $idarray = explode(',', $photo_ids_str);
    $patharray = explode(',', $photo_paths_str);
    $permissionArray = explode(',', $photo_permissions_str);
    $k = -1;
    for ( $i = 0; $i < count($idarray); $i++ ) {
        if ($permissionArray[$i] == 'yes' ) {
            $k = 1;
            break;
        }
    }
    if ( $k == -1 ) {   // have photos , but all of photos are  not allowed 
        $photo_path = "default photo path";
    } else {
        $photo_path = $patharray[$k];
    }
} else {            // have no photo
    $photo_path = "default photo path";
}
 echo $photo_path;
*/
 /*   end::how to get usable path in client side. */