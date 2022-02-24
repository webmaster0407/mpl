<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;


class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

    }

    public function viewProfile(Request $request) {
        $page_title = 'MPL - Profile';
        $meta_title = 'MPL - Profile';
        $meta_keyword = 'MPL, Marketing, Production, Talents, Profile, view Profile';
        $meta_description = 'MPL - Marketing and Production Limited ... ';
        $page_sub_title = 'Profile';
        $page_sub_group = 'Profile';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";



        $role = Auth::user()->role;
        $id = Auth::user()->id;
        $view_blade = null;
        $userdata = null;
        if ($role == 'client') {    // if user is client
            $view_blade = 'front.pages.viewclientprofile';
            $userdata = DB::table('clients')
                ->leftJoin('users', 'clients.user_id', '=', 'users.id')
                ->select(
                    'clients.*'
                )
                ->where('users.id', '=', $id)
                ->first();
            return view($view_blade,
                compact(
                    'page_title',
                    'meta_title',
                    'meta_keyword',
                    'meta_description',
                    'page_sub_title',
                    'page_sub_group',
                    'prefix',
                    'userdata'
                )
            );
        } else {        // if user is talent
            $view_blade = 'front.pages.viewtalentprofile';
            $userdata = DB::table('talents')
                ->leftJoin('users', 'talents.user_id', '=', 'users.id')
                ->select(
                    'talents.*'
                )
                ->where('users.id', '=', $id)
                ->first();
            $categories = DB::table('categories')->where('permission', '=', 'yes')->get();
            $photos = DB::table('photos')
                ->leftJoin('users', 'photos.user_id', '=', 'users.id')
                ->select(
                    'photos.id as id', 
                    'photos.path as path' 
                )
                ->where('photos.user_id', '=', Auth::user()->id)
                ->get();
            return view($view_blade,
                compact(
                    'page_title',
                    'meta_title',
                    'meta_keyword',
                    'meta_description',
                    'page_sub_title',
                    'page_sub_group',
                    'prefix',
                    'userdata',
                    'categories',
                    'photos'
                )
            );
        }
    }

    public function editTalentprofile() {
        $page_title = 'MPL - Profile';
        $meta_title = 'MPL - Profile';
        $meta_keyword = 'MPL, Marketing, Production, Talents, Profile, view Profile';
        $meta_description = 'MPL - Marketing and Production Limited ... ';
        $page_sub_title = 'Profile';
        $page_sub_group = 'Profile';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        $userdata = DB::table('talents')
            ->leftJoin('users', 'talents.user_id', '=', 'users.id')
            ->select(
                'talents.*'
            )
            ->where('users.id', '=', Auth::user()->id)
            ->first();
        $categories = DB::table('categories')->where('permission', '=', 'yes')->get();
        $photos = DB::table('photos')
            ->leftJoin('users', 'photos.user_id', '=', 'users.id')
            ->select(
                'photos.id as id', 
                'photos.path as path' 
            )
            ->where('photos.user_id', '=', Auth::user()->id)
            ->get();
        return view('front.pages.edittalentprofile',
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'prefix',
                'userdata',
                'categories',
                'photos'
            )
        );
    }

    public function editProfile(Request $request) {
        $data = $request->all();

        $id = Auth::user()->id;

        if (Auth::user()->role === 'client') {  // if user is client
            $name = $data['name'];
            $email = $data['email'];
            $company = $data['company'];
            $telephone = $data['telephone'];

            // check if email address changed 
            if (Auth::user()->email !== $email ) {
                if ($this->checkIfNewEmailAddressIsExist($email) === true) {  // then check if new email address is exists
                    $data = [
                        'status' => 'failed',
                        'message' => 'New Email Address is Already Exist!, Please use other address!'
                    ];
                    echo json_encode($data);
                    return;
                }
            }
            $clientId = DB::table('users')
                ->rightJoin('clients', 'clients.user_id', '=', 'users.id')
                ->select('clients.id as id')
                ->where('users.id', '=', Auth::user()->id)
                ->first()
                ->id;

            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'name' => $name,
                    'email' => $email
                ]);
            DB::table('clients')
                ->where('clients.id', '=', $clientId)
                ->update([
                    'telephone' => $telephone,
                    'company' => $company
                ]);

            $data = [
                'status' => 'success',
                'message' => 'Profile Updated Successfully!'
            ];
            echo json_encode($data);
            return;
        } else {        // if user is talent

            $name = $data['name'];
            $email = $data['email'];
            // check if email address changed 
            if (Auth::user()->email !== $email ) {
                if ($this->checkIfNewEmailAddressIsExist($email) === true) {  // then check if new email address is exists
                    $data = [
                        'status' => 'failed',
                        'message' => 'New Email Address is Already Exist!, Please use other address!'
                    ];
                    echo json_encode($data);
                    return;
                }
            }
            DB::table('users')
                    ->where('id', '=', Auth::user()->id)
                    ->update([
                        'name' => $name,
                        'email' => $email
                    ]);
            $talentId = DB::table('users')
                ->rightJoin('talents', 'talents.user_id', '=', 'users.id')
                ->select('talents.id as id')
                ->where('users.id', '=', Auth::user()->id)
                ->first()
                ->id;

            $cat_id = $data['cat_id'];
            $gender = $data['gender'];
            $phone = $data['phone'];
            $birthday_year = $data['birthday_year'];
            $height = $data['height'];
            $weight = $data['weight'];
            $chest = $data['chest'];
            $hips = $data['hips'];
            $shoes = $data['shoes'];
            $job_reference = $data['job_reference'];
            DB::table('talents')
                ->where('id', '=', $talentId)
                ->update([
                    'cat_id' => $cat_id,
                    'gender' => $gender,
                    'phone' => $phone,
                    'birthday_year' => $birthday_year,
                    'height' => $height,
                    'weight' => $weight,
                    'chest' => $chest,
                    'hips' => $hips,
                    'shoes' => $shoes,
                    'job_reference' => $job_reference
                ]);
            $data = [
                'status' => 'success',
                'message' => 'Profile Updated successfully!'
            ];
            echo json_encode($data);
            return;
        }
    }

    public function checkIfNewEmailAddressIsExist($email) {
        $user = DB::table('users')->where('email', '=', $email)->first();
        if ($user === null) {
            return false;
        } else {
            return true;
        }
    }

    public function uploadPhotos(Request $request) {
        $photo = $request->file('file');
        $photoName = $photo->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads/photos', $photoName, 'public');

        $photo_id = DB::table('photos')
            ->insertGetId([
                'user_id' => Auth::user()->id,
                'path' => 'storage/' . $path
            ]);

        $data = [
            'status' => 'success',
            'message' => 'Uploaded Successfully!',
            'path' => DB::table('photos')->where('id', '=', $photo_id)->first()->path,
            'id' => DB::table('photos')->where('id', '=', $photo_id)->first()->id
        ];
        
        echo json_encode($data);
    }

    public function deletePhotoUploadedJustByDropzone(Request $request) {
        $filename =  $request->get('filename');
        $path = 'storage/uploads/photos/' . $filename;

        DB::table('photos')
            ->where('path', '=', $path)
            ->delete();

        $path = public_path() . '/' . $path;
        if ( file_exists( $path ) ) {
            @unlink($path);
            $data = [
                'status' => 'success',
                'message' => 'Photo deleted successfully!'
            ];
            echo json_encode($data);
            return;
        }
        $data = [
            'status' => 'failed',
            'message' => 'File does not exist'
        ];
        echo json_encode($data);
        return;  
    }

    public function deletePhotos(Request $request) {
        $data = $request->only('id');
        $photo_id = $data['id'];

        $photo = DB::table('photos')
            ->where('id', '=', $photo_id)
            ->first();
        $path = public_path() . '/' . $photo->path;

        if ( file_exists($path) ) {
            @unlink($path);
            DB::table('photos')->where('id', '=', $photo_id)->delete();
            $data = [
                'status' => 'success',
                'message' => 'Photo deleted successfully!'
            ];
        } else {
            $data = [
                'status' => 'failed',
                'message' => 'File does not exist'
            ];
        }
        echo json_encode($data);
    }
}
