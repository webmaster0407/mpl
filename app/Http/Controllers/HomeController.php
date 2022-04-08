<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;
use Session;
use Image;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth')
            ->except(
                "index",
                "login",
                "doLogin",
                "register",
                "clientRegister",
                "talentRegister",
                "doRegister",
                "changePassword",
                "doChangePassword",
                "uploadPhotosBeforeRegister",
                "deletePhotosBeforeRegister",
                'deletePhotosWhenUserLeaveRegisterWindow',
                "logout",
                "resetPassword"
            );
    }

    public function index() {
        $page_title = 'MPL - Marketing and Production Limited';
        $meta_title = 'MPL - Marketing and Production Limited';
        $meta_keyword = 'MPL, Marcketin, Production';
        $meta_description = 'MPL - Marketing and Production Limited ... ';
        $page_sub_title = 'Home';
        $page_sub_group = 'Home';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";
        
        $table_name = $prefix . "_homepages";

        $sectionData1 = DB::table($table_name)->where('id', '=', 1)->first();
        $sectionData2 = DB::table($table_name)->where('id', '=', 2)->first();
        $sectionData3 = DB::table($table_name)->where('id', '=', 3)->first();
        $sectionData4 = DB::table($table_name)->where('id', '=', 4)->first();

        $cmsPages = DB::table('cms')->where('is_active', '=', 'yes')->where('lang', '=', $locale)->where('is_footer', '=', 'yes')->get();

        return view('front.pages.home',
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'sectionData1',
                'sectionData2',
                'sectionData3',
                'sectionData4',
                'cmsPages',
                'prefix'
            )
        );
    }

    public function login() {
        $page_title = 'MPL - LOGIN';
        $meta_title = 'MPL - Marketing and Production Limited, login';
        $meta_keyword = 'MPL, Marcketin, Production, Login';
        $meta_description = 'MPL - Marketing and Production Limited ... ';
        $page_sub_title = 'Login';
        $page_sub_group = 'Home';

        if (Session::has('user')) {
            return redirect(route('base_url')); 
        }

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        // return view('admin.test');
        return view('front.pages.login', 
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'prefix'
            ));
    }

    public function doLogin(Request $request) {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];

        if (Auth::attempt([
                    'email'      => $email,
                    'password'   => $password
                ])) {
            $user = User::where('email', '=', $email)->first();
            
            // begin::check if permission of user is 'yes'
            $role = $user->role;
            if ($role === 'talent') {
                $talent = DB::table('users')
                                ->leftJoin('talents', 'users.id', '=', 'talents.user_id')
                                ->select('talents.permission as permission')
                                ->where('users.id', '=', $user->id)
                                ->first();
                if ( $talent->permission === 'no' ) {
                    $data = [
                        'status' => 'failed',
                        'message' => 'You are not allowed yet. Please wait while admin allows you.'
                    ];
                    echo json_encode($data);
                    return;
                }
            } else if ($role === 'client') {
                $client = DB::table('users')
                                ->leftJoin('clients', 'users.id', '=', 'clients.user_id')
                                ->select('clients.permission as permission')
                                ->where('users.id', '=', $user->id)
                                ->first();
                if ( $client->permission === 'no' ) {
                    $data = [
                        'status' => 'failed',
                        'message' => 'You are not allowed yet. Please wait while admin allows you.'
                    ];
                    echo json_encode($data);
                    return;
                }
            } else {
                $data = [
                    'status' => 'failed',
                    'message' => 'Bad action!. It seems that you are black-hearted human!'
                ];
                echo json_encode($data);
                return;
            }
            // begin::check if permission of user is 'yes'
            
            Session::put('user', $user);
            $msg = [
                'status'    => 'success',
                'message'   => 'Login Success !'
            ];
        } else {
            $msg = [
                'status'    => 'failed',
                'message'   => 'Login failed! Invalid Credential!'
            ];
        }
        echo json_encode($msg);
    }

    public function register() {

        $page_title = 'MPL - Register';
        $meta_title = 'MPL - Register';
        $meta_keyword = 'MPL, Marcketin, Production, Login, Register, Client, Talent';
        $meta_description = 'MPL - Select mode to register as  client or Talents... ';
        $page_sub_title = 'Register';
        $page_sub_group = 'Register';

        if (Session::has('user')) {
            return redirect(route('base_url')); 
        }

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        return view('front.pages.register', 
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'prefix'
            ));
    }

    public function clientRegister() {

        $page_title = 'MPL - Register as Client';
        $meta_title = 'MPL - Register as Client, login';
        $meta_keyword = 'MPL, Marcketin, Production, Login, Register, Client';
        $meta_description = 'MPL - Register as client to view Talents... ';
        $page_sub_title = 'As Client';
        $page_sub_group = 'Register';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        if (Session::has('user')) {
            return redirect(route('base_url')); 
        }

        return view('front.pages.clientRegister', 
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'prefix'
            ));
    }

    public function talentRegister() {

        $page_title = 'MPL - Register as Talent';
        $meta_title = 'MPL - Register as Talent, login';
        $meta_keyword = 'MPL, Marcketin, Production, Login, Register, Client, Talent';
        $meta_description = 'MPL - Register as Talent to ... ';
        $page_sub_title = 'As Talent';
        $page_sub_group = 'Register';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        if (Session::has('user')) {
            return redirect(route('base_url')); 
        }

        $categories = DB::table('categories')->where('permission', '=', 'yes')->get();

        return view('front.pages.talentRegister',
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'prefix',
                'categories'
            ));
    }

    public function doRegister(Request $request) {
        $data = $request->all();
        $register_type = $data['mode'];

        if ($register_type === 'CLIENT_MODE') {  // register as client
            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];

            if ($this->checkIfUserAlreadyExist($email) === true) { // user already exist
                $data = [
                    'status' => 'failed',
                    'message' => 'Sorry, Email address is already exists!'
                ];
                echo json_encode($data);
                return;
            }

            $new_user_id = DB::table('users')
                                ->insertGetId([
                                    'name' => $name,
                                    'email' => $email,
                                    'password' => Hash::make( $password ),
                                    'role' => 'client'
                                ]);
            $company = $data['company'];
            $telephone = $data['telephone'];
            
            DB::table('clients')->insert([
                                'user_id' => $new_user_id,
                                'telephone' => $telephone,
                                'company' => $company
                            ]);
            $data = [
                'status' => 'success',
                'message' => 'Registered successfully!'
            ];
            echo json_encode($data);
            return;

        } else if ($register_type === 'TALENT_MODE') {  // register as talent
            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];
            if ($this->checkIfUserAlreadyExist($email) === true) { // user already exist
                $data = [
                    'status' => 'failed',
                    'message' => 'Sorry, Email address is already exists!'
                ];
                echo json_encode($data);
                return;
            }
            $new_user_id = DB::table('users')
                                ->insertGetId([
                                    'name' => $name,
                                    'email' => $email,
                                    'password' => Hash::make( $password ),
                                    'role' => 'talent'
                                ]);
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
            DB::table('talents')->insert([
                'user_id' => $new_user_id,
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

            // begin::save images to db
            $imageNames = $data['imageNames'];
            $nameArray = explode(',', $imageNames);
            if (isset($nameArray) && (count($nameArray) > 0)) {
                foreach($nameArray as $name) {
                    if ( $name !== "" ) {
                        $path = 'storage/uploads/photos/' . $name;
                        DB::table('photos')
                                ->insert([
                                    'user_id' => $new_user_id,
                                    'path' => $path
                                ]);
                    }
                }
            }
            // end::save images to db

            $data = [
                'status' => 'success',
                'message' => 'Registered successfully!'
            ];
            echo json_encode($data);
            return;
        } else {    // seems be spam
            $data = [
                'status' => 'failed',
                'message' => 'Bad action!,It seems that you are black-hearted human!'
            ];
            echo json_encode($data);
            return;
        }
    }

    public function checkIfUserAlreadyExist($email) {
        $user = DB::table('users')->where('email', '=', $email)->first();
        if ($user === null) return false;
        else return true;
    }

    public function changePassword() {
        $page_title = 'MPL - Chaneg Password';
        $meta_title = 'MPL - Change Password';
        $meta_keyword = 'MPL, Marcketin, Production, Login, Register, change password';
        $meta_description = 'MPL - Change password for security ... ';
        $page_sub_title = 'Change Password';
        $page_sub_group = 'User Setting';

        $locale = "en";
        if (Session::has('locale')) {
            $locale = session('locale'); 
        }
        
        $prefix = "en";
        if ($locale === "zh-cn") $prefix = "cn";
        if ($locale === "zh-hk") $prefix = "hk";

        return view('front.pages.changepassword', 
            compact(
                'page_title',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'page_sub_title',
                'page_sub_group',
                'prefix'
            ));
    }

    public function doChangePassword(Request $request) {
        $data = $request->all();

        $current_password = $data['password'];
        $new_password = $data['new_password'];

        $user = Auth::user();

        if ( Hash::check( $current_password, $user->password ) ) {
            $user = User::where('id', '=', Auth::user()->id)
                    ->update(['password' =>  Hash::make($new_password) ]);
            $msg = [
                'status' => 'success',        // success
                'message' => 'Password changed successfully!.'
            ];
            echo json_encode($msg);
            return;
        }
        $msg = [
            'status' => 'failed',            // failed
            'message' => 'Current Password is not correct!'
        ];
        echo json_encode($msg);
        return;
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    /*--------------------handle upload and delete photo events before register------------------------*/

    public function uploadPhotosBeforeRegister(Request $request) {
        $photo = $request->file('file');
        $photoName = $photo->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads/photos', $photoName, 'public');
        $thumbnail =$request->file('file')->storeAs('uploads/photos/thumbnail', $photoName, 'public');
        $thumbnailpath = public_path('storage/uploads/photos/thumbnail/' . $photoName);
        $this->createThumbnail($thumbnailpath, 400, 400);

        $data = [
            'status' => 'success',
            'message' => 'storage/' . $path,
        ];
        
        echo json_encode($data);
    }

    public function createThumbnail($path, $width, $height) {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function deletePhotosWhenUserLeaveRegisterWindow(Request $request) {
        $data = $request->all();

        // begin::delete  images that uploaded before user registered
        $imageNames = $data['imageUrls'];
        $nameArray = explode(',', $imageNames);
        $ids = '';
        if (isset($nameArray) && (count($nameArray) > 0)) {
            foreach($nameArray as $name) {
                if ( $name !== "" ) {
                    $path = 'storage/uploads/photos/' . $name;
                    $thumbnailpath = 'storage/uploads/photos/thumbnail/' . $name;
                    // if ( file_exists( $path ) && file_exists( $thumbnailpath ) ) {
                        @unlink($path);
                        @unlink($thumbnailpath);
                    // } else {
                    //     $data = [
                    //         'status' => 'failed',
                    //         'message' => 'file does not exist'
                    //     ];
                    //     echo json_encode($data);
                    //     return; 
                    // }
                } 
            }
        }
        // end::delete  images that uploaded before user registered
        $data = [
            'status' => 'success',
            'message' => 'ok'
        ];
        echo json_encode($data);
        return;
    } 

    public function deletePhotosBeforeRegister(Request $request) {
        $filename =  $request->get('filename');
        $path = 'storage/uploads/photos/' . $filename;

        $path = public_path() . '/' . $path;
        $path_array = explode('/', $path);
        $cnt = count($path_array);
        $path_array[$cnt-2] = $path_array[$cnt-2] . '/thumbnail';
        $thumbnailpath = implode('/', $path_array);
        // if ( file_exists( $path ) && file_exists( $thumbnailpath ) ) {
            @unlink($path);
            @unlink($thumbnailpath);
            $data = [
                'status' => 'success',
                'message' => $filename
            ];
            echo json_encode($data);
            return;
        // }
        // $data = [
        //     'status' => 'failed',
        //     'message' => 'File does not exist'
        // ];
        // echo json_encode($data);
        // return;  
    }

    /********************     Reset password      ****************/
}
