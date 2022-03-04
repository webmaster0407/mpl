<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct() {
        $this->middleware('adminauth');
    }

    public function index() {
        $page_title = "Admin | Contacts";
        $page_description = "Contacts from users";
        $page_sub_title = "Contacts";
        $page_sub_group = "Contacts";

        return view('admin.pages.contacts',
            compact(
                'page_title',
                'page_description',
                'page_sub_title',
                'page_sub_group'
            )
        );
    }

    public function changeVisitedStates(Request $request) {
        $data = $request->only('id');
        $id = $data['id'];

        DB::table('contacts')
            ->where('id', '=', $id)
            ->update([
                'visited' => 'yes'
            ]);
        $data = [
            'status' => 'success',
            'message' => 'visited'
        ];
        echo json_encode($data);
    }

    public function getContactsData(Request $request) {
        $data = $request->all();
        
        $search_key = isset($data['query']['generalSearch']) ? '%' . $data['query']['generalSearch'] . '%' : "%";

        $sort_field = isset($data['sort']['field']) ?  $data['sort']['field']  : "id";
        $sort_key = isset($data['sort']['sort']) ?  $data['sort']['sort']  : "asc";

        $cms_pages = DB::table('contacts')
                ->where('name', 'LIKE', $search_key)
                ->orWhere('email', 'LIKE', $search_key)
                ->orWhere('phone', 'LIKE', $search_key)
                ->orWhere('subject', 'LIKE', $search_key)
                ->orWhere('message', 'LIKE', $search_key)
                ->orderBy($sort_field, $sort_key)
                ->select(
                    'contacts.id',
                    'contacts.name',
                    'contacts.email',
                    'contacts.phone',
                    'contacts.subject',
                    'contacts.message',
                    'contacts.visited'
                )->get();

        echo json_encode($cms_pages);
    }

    public function getContactDetail(Request $request) {
        $data = $request->all();
        $id = $data['id'];

        $contact = DB::table('contacts')->where('id', '=', $id)->first();

        $data = [
            'status' => 'success',
            'data' => $contact
        ];

        echo json_encode($data);
    }

    public function deleteContacts(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        DB::table('contacts')
            ->where('id', '=', $id)
            ->delete();
        $data = [
            'status' => 'success',
            'message' => 'Deleted successfully!'
        ];
        echo json_encode($data);
    }
}
