<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;
use Session;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminauth')
            ->except(
                "login",
                "doLogin",
                "logout",
                "changePassword"
            );
    }

    public function index() {        
        return view('admin.home');
    }

    public function login() {
        $page_title = "Admin | Login";
        $page_description = "Log in to Admin Panel";

        if (Session::has('admin')) {
            return redirect(route('admin.home')); 
        }
        // return view('admin.test');
        return view('admin.login', compact('page_title', 'page_description'));
    }

    public function doLogin(Request $request) {
        
        $data = $request->all();
        $username = $data['username'];
        $password = $data['password'];
        $remember = $data['remember'];
        // if ( Auth::attempt( [
        //         'email'      => $username,
        //         'password'   => $password,
        //         'role'       => "admin" ]) ) 
         if ( Auth::attempt( [
                'name'      => $username,
                'password'   => $password,
                'role'       => "admin" ]) ) {
            $admin = User::where('name', '=', $username)->first();
            // $admin = User::where('email', '=', $username)->first();
            Session::put('admin', $admin);
            $admin_photo = DB::table('users')
                        ->rightJoin('photos', 'users.id', '=', 'photos.user_id')
                        ->select('photos.path as path')
                        ->where('photos.user_id', '=', $admin->id)
                        ->first();
            $admin_photo_url = asset('assets/admin/media/users/blank.png');
            if ($admin_photo !== null) {
                $admin_photo_url = public_path() . '/' . $admin_photo->path;
            } 
            Session::put('admin_photo_url', $admin_photo_url);
            $msg = [
                'status'    => 'success',
                'message'   => 'Login Success ! Now you can visit admin panel'
            ];
        } else {
            $msg = [
                'status'    => 'failed',
                'message'   => 'Login failed ! Invalid Credential!'
            ];
        }
        echo json_encode($msg);
    }

    public function changePassword( Request $request ) {
        $page_title = "Admin | ChangePassword";
        $page_description = "Change Password of  Admin Panel";
        $page_sub_title = "Change Password";
        $page_sub_group = "Home";

        return view('admin.changepassword', 
            compact(
                'page_title', 
                'page_description',
                'page_sub_group',
                'page_sub_title'
            )
        );
    }

    public function doChangePassword(Request $request) {
        $data = $request->all();

        $current_password = $data['current_password'];
        $new_password = $data['new_password'];

        $user = Auth::user();

        if ( Hash::check( $current_password, $user->password ) ) {
            $user = User::where('id', '=', Auth::user()->id)
                    ->update(['password' =>  Hash::make($new_password) ]);
            $msg = array(
                'status' => 'success',        // success
                'message' => 'Password reseted newly! You must use this password from now.'
            );
            echo json_encode($msg);
            return;
        }
        $msg = array(
            'status' => 'failed',            // failed
            'message' => 'Input Password correctly! Current Password is not correct!'
        );
        echo json_encode($msg);
        return;
    }

    public function updateProfile() {
        $page_title = "Admin | Update Profile";
        $page_description = "Update profile of  Administrator";
        $page_sub_title = "Update Profile";
        $page_sub_group = "Home";

        return view('admin.updateprofile',
            compact(
                'page_title', 
                'page_description',
                'page_sub_group',
                'page_sub_title'
            )
        );
    }

    public function doUpdateProfile(Request $request) {
        $data = $request->all();
        $name = $data['name'];
        $email = $data['email'];
        $user_id = Auth::user()->id;
        // $photo = $request->file('photo');
        // $photoName = time() . $photo->getClientOriginalName();
        // $path = $request->file('file')->storeAs('uploads/adminPhoto', $photoName, 'public');

        // $imageUpload = new Ftpages;
        // $imageUpload->cat_id = $data['cat_id'];
        // $imageUpload->path = "storage/".$path;
        // $imageUpload->save();

        // $data = [
        //     'status' => 'success',
        //     'message' => $mediaName
        // ];
        
        // echo json_encode($data);


        

        // $admin_photo = DB::table('users')
        //             ->rightJoin('photos', 'users.id', '=', 'photos.user_id')
        //             ->select('photos.path as path, photos.id as id')
        //             ->where('photos.user_id', '=', $user_id)
        //             ->first();


        // if ($admin_photo === null) {    // insert admin photo
        //     DB::table('photos')
        //         ->insert([
        //             'user_id' => $user_id,
        //             'path' => $path,
        //             'permission' => 'yes'
        //         ]);
        // } else {        // update
        //     // DB::table('photos')-> 
        //     //     ->where('id', '=', $admin_photo['id'])
        //     //     ->insert([
        //     //         'path' => $path
        //     //             ]);
        // }


        DB::table('users')
            ->where('id', '=', $user_id)
            ->update([
                'name' => $name,
                'email' => $email
            ]);

        $msg = array(
            'status' => 'success',
            'message' => 'Profile Updated successfully!'
        );
        echo json_encode($msg);
        return;
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('admin.login'));
    }
}
