<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Clients;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index() {
        $page_title = "Admin | Users";
        $page_description = "Client user management";
        $page_sub_title = "Clients";
        $page_sub_group = "Users";

        return view('admin.users.clients',
            compact(
                'page_title',
                'page_description',
                'page_sub_title',
                'page_sub_group'
            )
        );
    }

    public function getClientsData(Request $request) {
        $data = $request->all();
        
        $search_key = isset($data['query']['generalSearch']) ? '%' . $data['query']['generalSearch'] . '%' : "%";

        $sort_field = isset($data['sort']['field']) ?  $data['sort']['field']  : "id";
        $sort_key = isset($data['sort']['sort']) ?  $data['sort']['sort']  : "asc";


        $talents = DB::table('users')
                    ->rightJoin('clients', 'users.id', '=', 'clients.user_id')
                    ->select( 
                        'clients.id as id',
                        'users.name as name', 
                        'users.email as email',
                        'clients.telephone as telephone',
                        'clients.company as company',
                        'clients.permission as permission'
                    )
                    ->where('clients.id', 'LIKE', $search_key)
                    ->orWhere('users.name', 'LIKE', $search_key)
                    ->orWhere('users.email', 'LIKE', $search_key)
                    ->orWhere('clients.telephone', 'LIKE', $search_key)
                    ->orWhere('clients.company', 'LIKE', $search_key)
                    ->orWhere('clients.permission', 'LIKE', $search_key)
                    ->orderBy($sort_field, $sort_key)
                    ->get();
        echo json_encode($talents);
    }

    public function getClientDetail(Request $request) {
        $request_data = $request->only('id');
        $id = $request_data['id'];

        $client = DB::table('users')
                    ->rightJoin('clients', 'users.id', '=', 'clients.user_id')
                    ->select( 
                        'clients.id as id',
                        'users.name as name', 
                        'users.email as email',
                        'clients.telephone as telephone',
                        'clients.company as company',
                        'users.id as user_id'
                    )
                    ->where('clients.id', '=', $id)
                    ->get()
                    ->first();
        if ($client === null) {
            $data = [
                'status' => 'success',
                'data' => $client
            ];
            echo json_encode($data);
            return;
        }
        $user_id = $client->user_id;
        $data = [
            'status' => 'success',
            'data' => $client
        ];
        echo json_encode($data);
    }

    public function updateClient(Request $request) {
        $data = $request->all();

        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $telephone = $data['telephone'];
        $company = $data['company'];

        // check if user email is changed
        $user = DB::table('clients')
                ->rightJoin('users', 'clients.user_id', '=', 'users.id')
                ->where('clients.id', '=', $id)
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
        DB::table('clients')
            ->where('id', '=', $id)
            ->update([
                'telephone' => $telephone,
                'company'   => $company
            ]);
        $data = [
            'status'    => 'success',
            'message'   => 'Updated successfully!'
        ];
        echo json_encode($data);
    }

    public function updateClientState(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        $current_state = $data['state'];

        $new_state = (( $current_state === 'yes' ) ? 'no' : 'yes');

        DB::table('clients')
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

    public function deleteClient(Request $request) {
        $data = $request->only('id');

        $user = DB::table('clients')
                ->rightJoin('users', 'clients.user_id', '=', 'users.id')
                ->where('clients.id', '=',  $data['id'])
                ->select( 'users.id as id')
                ->first(); 

        DB::table('users')->where('id', '=', $user->id)->delete();

        $data = [
            'status' => 'success',
            'message' => 'Deleted successfully!'
        ];

        echo json_encode($data);
    }


}
