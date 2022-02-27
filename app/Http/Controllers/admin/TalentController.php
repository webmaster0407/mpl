<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Talents;

class TalentController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index() {
        $page_title = "Admin | Users";
        $page_description = "Talent user management";
        $page_sub_title = "Talents";
        $page_sub_group = "Users";

        // $categories = DB::table('categories')->where('permission', '=', 'yes')->get();
        $categories = DB::table('categories')->get();
        return view('admin.users.talents',
            compact(
                'page_title',
                'page_description',
                'page_sub_title',
                'page_sub_group',
                'categories'
            )
        );
    }

    public function getTalentsData(Request $request) {
        $data = $request->all();
        
        $search_key = isset($data['query']['generalSearch']) ? '%' . $data['query']['generalSearch'] . '%' : "%";

        $sort_field = isset($data['sort']['field']) ?  $data['sort']['field']  : "id";
        $sort_key = isset($data['sort']['sort']) ?  $data['sort']['sort']  : "asc";


        $talents = DB::table('users')
                    ->rightJoin('talents', 'users.id', '=', 'talents.user_id')
                    ->leftJoin('categories', 'categories.id', '=', 'talents.cat_id')
                    ->select( 
                        'talents.id as id',
                        'users.name as name', 
                        'users.email as email',
                        'talents.gender as gender',
                        'talents.phone as phone',
                        'categories.name as category',
                        // 'talents.birthday_year as birthday_year',
                        'talents.permission as permission'
                    )
                    ->where('talents.id', 'LIKE', $search_key)
                    ->orWhere('users.name', 'LIKE', $search_key)
                    ->orWhere('users.email', 'LIKE', $search_key)
                    ->orWhere('talents.gender', 'LIKE', $search_key)
                    ->orWhere('talents.phone', 'LIKE', $search_key)
                    ->orWhere('categories.name', 'LIKE', $search_key)
                    // ->orWhere('talents.birthday_year', 'LIKE', $search_key)
                    ->orWhere('talents.permission', 'LIKE', $search_key)
                    ->orderBy($sort_field, $sort_key)
                    ->get();
        echo json_encode($talents);
    }

    public function getTalentDetail(Request $request) {
        $request_data = $request->only('id');
        $id = $request_data['id'];

        $talent = DB::table('users')
                    ->rightJoin('talents', 'users.id', '=', 'talents.user_id')
                    ->leftJoin('categories', 'categories.id', '=', 'talents.cat_id')
                    ->select( 
                        'talents.id as id',
                        'users.name as name', 
                        'users.email as email',
                        'talents.gender as gender',
                        'talents.phone as phone',
                        'talents.birthday_year as birthday_year',
                        'talents.height as height',
                        'talents.weight as weight',
                        'talents.chest as chest',
                        'talents.hips as hips',
                        'talents.shoes as shoes',
                        'talents.cat_id as cat_id',
                        'talents.job_reference as job_reference',
                        'users.id as user_id'
                    )
                    ->where('talents.id', '=', $id)
                    ->get()
                    ->first();
        if ($talent === null) {
            $data = [
                'status' => 'success',
                'data' => $talent
            ];
            echo json_encode($data);
            return;
        }
        $user_id = $talent->user_id;
        $uploaded_photos = DB::table('photos')
                        ->where('user_id', '=', $user_id)
                        ->get();

        $data = [
            'status' => 'success',
            'data' => $talent,
            'photos' => $uploaded_photos
        ];
        echo json_encode($data);
    }

    public function photoPermissionStateChange(Request $request) {
        $data = $request->all();
        $photo_id = $data['photo_id'];
        $photo_state = $data['photo_state'];
        $new_state = ($photo_state === 'yes') ? 'no' : 'yes';
        DB::table('photos')
            ->where('id', '=', $photo_id)
            ->update([
                'permission' => $new_state
            ]);
        $text = ($new_state === 'yes') ? 'Activated' : 'Deactivated';
        $data = [
            'status' => 'success',
            'message' => 'Photo ' . $text . ' Successfully!'
        ];
        echo json_encode($data);
    }

    public function deleteTalentPhoto(Request $request) {
        $data = $request->only('photo_id');
        $photo_id = $data['photo_id'];

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

    // public function checkIfTalentAlreadyExist($email) {
    //     $user = DB::table('users')
    //                 ->where('email', '=', $email)
    //                 ->first();
    //     if ($user === null) return true;
    //     else return false;
    // } 

    // public function addCategory(Request $request) {
    //     $data = $request->all();

    //     $cat_name = $data['cat_name'];
    //     $cat_description = $data['cat_description'];

    //     if ($this->checkIfTalentAlreadyExist($email) === false) { // category already exist
    //         $data = [
    //             'status' => 'failed',
    //             'message' => 'User already exists!'
    //         ];
    //         echo json_encode($data);
    //         return;
    //     }

    //     DB::table('talents')
    //         ->insert(
    //             [
    //                 'name' => $cat_name,
    //                 'description' => $cat_description
    //             ]
    //         );
    //     $data = [
    //         'status' => 'success',
    //         'message' => 'Added successfully!'
    //     ];
    //     echo json_encode($data);
    // }

    public function updateTalent(Request $request) {
        $data = $request->all();

        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $gender = $data['gender'];
        $phone = $data['phone'];
        $birthday_year = $data['birthday_year'];
        $height = $data['height'];
        $weight = $data['weight'];
        $chest = $data['chest'];
        $hips = $data['hips'];
        $shoes = $data['shoes'];
        $cat_id = $data['cat_id'];
        $job_reference = $data['job_reference'];

        // check if user email is changed
        $user = DB::table('talents')
                ->rightJoin('users', 'talents.user_id', '=', 'users.id')
                ->where('talents.id', '=', $id)
                ->select( 'users.id as id', 'users.name as name', 'users.email as email')
                ->first();
        $user_id = $user->id;   // id of users table
        if ($user->email !== $email) {  // if changed
            // check if new email is duplicated
            $same_email_user = DB::table('users')->where('email', '=', $email)->first();
            if ($same_email_user === null) {    // if new email is not duplicated
                DB::table('users')
                    ->where('id', '=', $user_id)
                    ->update([
                        'name' => $name,
                        'email' => $email
                    ]);
            } else {    // new email is duplicated
                $data = [
                    'status'    => 'failed',
                    'message'   => 'New email address is already registered. Please input other email address.'
                ];
                echo json_encode($data);
                return;
            }
        } else {
            DB::table('users')
                ->where('id', '=', $user_id)
                ->update([
                    'name' => $name,
                    'email' => $email
                ]);
        }

        // update talents table
        DB::table('talents')
            ->where('id', '=', $id)
            ->update([
                'cat_id'        => $cat_id,
                'gender'        => $gender,
                'phone'         => $phone,
                'birthday_year' => $birthday_year,
                'height'        => $height,
                'weight'        => $weight,
                'chest'         => $chest,
                'hips'          => $hips,
                'shoes'         => $shoes,
                'job_reference' => $job_reference
            ]);
        $data = [
            'status'    => 'success',
            'message'   => 'Updated successfully!'
        ];

        echo json_encode($data);
    }

    public function updateTalentState(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        $current_state = $data['state'];

        $new_state = (( $current_state === 'yes' ) ? 'no' : 'yes');

        DB::table('talents')
                ->where('id', '=', $id)
                ->update([
                    'permission' => $new_state
                ]);
        $data = [
            'status' => 'success',
            'message' => 'Permission state Updated successfully!'
        ];
        echo json_encode($data);
    }

    public function deleteTalent(Request $request) {
        $data = $request->only('id');

        $user = DB::table('talents')
                ->rightJoin('users', 'talents.user_id', '=', 'users.id')
                ->where('talents.id', '=',  $data['id'])
                ->select( 'users.id as id', 'users.name as name', 'users.email as email')
                ->first();
        $user_id = $user->id;   

        DB::table('users')->where('id', '=', $user_id)->delete();
        // DB::table('talents')->where('id', '=', $data['id'])->delete();

        $data = [
            'status' => 'success',
            'message' => 'Deleted successfully!'
        ];

        echo json_encode($data);
    }

}
