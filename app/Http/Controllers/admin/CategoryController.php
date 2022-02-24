<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('adminauth');
    }

    public function index() {
        $page_title = "Admin | Categories";
        $page_description = "Edit Categories for talents";
        $page_sub_title = "Categories";
        $page_sub_group = "Category";

        return view('admin.categories.categories',
            compact(
                'page_title',
                'page_description',
                'page_sub_title',
                'page_sub_group'
            )
        );
    }

    public function getCategoriesData(Request $request) {
        $data = $request->all();
        
        $search_key = isset($data['query']['generalSearch']) ? '%' . $data['query']['generalSearch'] . '%' : "%";

        $sort_field = isset($data['sort']['field']) ?  $data['sort']['field']  : "id";
        $sort_key = isset($data['sort']['sort']) ?  $data['sort']['sort']  : "asc";

        $categories = DB::table('categories')
                ->where('name', 'LIKE', $search_key)
                ->orWhere('id', 'LIKE', $search_key)
                ->orWhere('description', 'LIKE', $search_key)
                ->orWhere('permission', 'LIKE', $search_key)
                ->orderBy($sort_field, $sort_key)
                ->select(
                    'categories.id',
                    'categories.name',
                    'categories.description',
                    'categories.permission'
                )->get();

        echo json_encode($categories);
    }

    public function getCategoryDetail(Request $request) {
        $request_data = $request->only('cat_id');
        $id = $request_data['cat_id'];

        $category = DB::table('categories')
                ->where('id', '=', $id)
                ->first();
        if ($category === null) {
            $data = [
                'status' => 'success',
                'data' => $category
            ];
            echo json_encode($data);
            return;
        }

        $data = [
            'status' => 'success',
            'data' => $category
        ];

        echo json_encode($data);
    }

    public function checkIfCategoryExist($name) {
        $category = DB::table('categories')
                    ->where('name', '=', $name)
                    ->first();
        if ($category === null) return true;
        else return false;
    } 

    public function addCategory(Request $request) {
        $data = $request->all();

        $cat_name = $data['cat_name'];
        $cat_description = $data['cat_description'];

        if ($this->checkIfCategoryExist($cat_name) === false) { // category already exist
            $data = [
                'status' => 'failed',
                'message' => 'Category already exists!'
            ];
            echo json_encode($data);
            return;
        }

        DB::table('categories')
            ->insert(
                [
                    'name' => $cat_name,
                    'description' => $cat_description
                ]
            );
        $data = [
            'status' => 'success',
            'message' => 'Added successfully!'
        ];
        echo json_encode($data);
    }

    public function updateCategory(Request $request) {
        $data = $request->all();

        $id = $data['cat_id'];
        $cat_name = $data['cat_name'];
        $cat_description = $data['cat_description'];

        DB::table('categories')
            ->where('id', '=', $id)
            ->update([
                    'name' => $cat_name,
                    'description' => $cat_description
                ]);
        $data = [
            'status' => 'success',
            'message' => 'Updated successfully!'
        ];
        echo json_encode($data);
    }

    public function updatePermissionState(Request $request) {
        $data = $request->all();
        $id = $data['cat_id'];
        $current_state = $data['current_state'];

        $new_state = (( $current_state === 'yes' ) ? 'no' : 'yes');

        DB::table('categories')
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

    public function deleteCategory(Request $request) {
        $data = $request->only('cat_id');
        Db::table('categories')->where('id', '=', $data['cat_id'])->delete();

        $data = [
            'status' => 'success',
            'message' => 'Deleted successfully!'
        ];

        echo json_encode($data);
    }

}
