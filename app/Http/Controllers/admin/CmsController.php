<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cms;

class CmsController extends Controller
{
    public function __construct() {
        $this->middleware('adminauth');
    }

    public function index() {
        $page_title = "Admin | CMS";
        $page_description = "CMS pages";
        $page_sub_title = "CMS";
        $page_sub_group = "Pages";

        return view('admin.pages.cms',
            compact(
                'page_title',
                'page_description',
                'page_sub_title',
                'page_sub_group'
            )
        );
    }

    public function getCmsData(Request $request) {
        $data = $request->all();
        
        $search_key = isset($data['query']['generalSearch']) ? '%' . $data['query']['generalSearch'] . '%' : "%";

        $sort_field = isset($data['sort']['field']) ?  $data['sort']['field']  : "id";
        $sort_key = isset($data['sort']['sort']) ?  $data['sort']['sort']  : "asc";

        $cms_pages = DB::table('cms')
                ->where('slug', 'LIKE', $search_key)
                ->orWhere('id', 'LIKE', $search_key)
                ->orWhere('is_active', 'LIKE', $search_key)
                ->orWhere('is_menu', 'LIKE', $search_key)
                ->orWhere('is_header', 'LIKE', $search_key)
                ->orWhere('is_footer', 'LIKE', $search_key)
                ->orderBy($sort_field, $sort_key)
                ->select(
                    'cms.id',
                    'cms.slug',
                    'cms.is_active',
                    'cms.is_menu',
                    'cms.is_header',
                    'cms.is_footer'
                )->get();

        echo json_encode($cms_pages);
    }

    public function updateIsActiveState(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        $current_state = $data['state'];

        $new_state = (( $current_state === 'yes' ) ? 'no' : 'yes');

        DB::table('cms')
                ->where('id', '=', $id)
                ->update([
                    'is_active' => $new_state
                ]);
        $data = [
            'status' => 'success',
            'message' => 'Permission state Updated successfully!'
        ];
        echo json_encode($data);
    }

    public function updateIsMenuState(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        $current_state = $data['state'];

        $new_state = (( $current_state === 'yes' ) ? 'no' : 'yes');

        DB::table('cms')
                ->where('id', '=', $id)
                ->update([
                    'is_menu' => $new_state
                ]);
        $data = [
            'status' => 'success',
            'message' => 'Permission state Updated successfully!'
        ];
        echo json_encode($data);
    }

    public function updateIsHeaderState(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        $current_state = $data['state'];

        $new_state = (( $current_state === 'yes' ) ? 'no' : 'yes');

        DB::table('cms')
                ->where('id', '=', $id)
                ->update([
                    'is_header' => $new_state
                ]);
        $data = [
            'status' => 'success',
            'message' => 'Permission state Updated successfully!'
        ];
        echo json_encode($data);
    }

    public function updateIsFooterState(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        $current_state = $data['state'];

        $new_state = (( $current_state === 'yes' ) ? 'no' : 'yes');

        DB::table('cms')
                ->where('id', '=', $id)
                ->update([
                    'is_footer' => $new_state
                ]);
        $data = [
            'status' => 'success',
            'message' => 'Permission state Updated successfully!'
        ];
        echo json_encode($data);
    }

    public function getCmsDetail(Request $request) {
        $request_data = $request->only('id');
        $id = $request_data['id'];

        $cms = DB::table('cms')
                ->where('id', '=', $id)
                ->first();
        if ($cms === null) {
            $data = [
                'status' => 'success',
                'data' => $cms
            ];
            echo json_encode($data);
            return;
        }
        $data = [
            'status' => 'success',
            'data' => $cms
        ];
        echo json_encode($data);
    }

    public function ifCmsAlreadyExist($slug) {
        $cms = DB::table('cms')
                    ->where('slug', '=', $slug)
                    ->first();
        if ($cms === null) return true;
        else return false;
    }

    public function addNewCmsPage(Request $request) {
        $data = $request->all();
        if ($this->ifCmsAlreadyExist($data['slug']) === false) { // category already exist
            $data = [
                'status' => 'failed',
                'message' => 'Slug already exists!'
            ];
            echo json_encode($data);
            return;
        }
        DB::table('cms')
            ->insert([
                    'slug'              => $data['slug'],
                    'page_title'        => $data['page_tite'],
                    'meta_title'        => $data['meta_title'],
                    'meta_keyword'      => $data['meta_keyword'],
                    'meta_description'  => $data['meta_description'],
                    'page_sub_title'    => $data['page_sub_title'],
                    'page_sub_group'    => $data['page_sub_group'],
                    'short_desc'        => $data['short_desc'],
                    'description'       => $data['description'],
                    'is_active'         => $data['is_active'],
                    'is_menu'           => $data['is_menu'],
                    'is_header'         => $data['is_header'],
                    'is_footer'         => $data['is_footer']
                ]);
        $data = [
            'status' => 'success',
            'message' => 'Add successfully!'
        ];
        echo json_encode($data);
    }

    public function updateCmsPage(Request $request) {
        $data = $request->all();
        DB::table('cms')
            ->where('id', '=', $data['id'])
            ->update([
                    'slug'              => $data['slug'],
                    'page_title'        => $data['page_tite'],
                    'meta_title'        => $data['meta_title'],
                    'meta_keyword'      => $data['meta_keyword'],
                    'meta_description'  => $data['meta_description'],
                    'page_sub_title'    => $data['page_sub_title'],
                    'page_sub_group'    => $data['page_sub_group'],
                    'short_desc'        => $data['short_desc'],
                    'description'       => $data['description'],
                    'is_active'         => $data['is_active'],
                    'is_menu'           => $data['is_menu'],
                    'is_header'         => $data['is_header'],
                    'is_footer'         => $data['is_footer']
                ]);
        $data = [
            'status' => 'success',
            'message' => 'Updated successfully!'
        ];
        echo json_encode($data);
    }

    public function deleteCmsPage(Request $request) {
        $data = $request->only('id');
        Db::table('cms')->where('id', '=', $data['id'])->delete();

        $data = [
            'status' => 'success',
            'message' => 'Deleted successfully!'
        ];
        echo json_encode($data);
    }

}
