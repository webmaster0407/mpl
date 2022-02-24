<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Ftpages;

class FindTalentPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index() {
        $page_title = "Admin | Pages";
        $page_description = "Find Talent Page Mange";
        $page_sub_title = "Find Talent";
        $page_sub_group = "Pages";

        $categories = DB::table('categories')->where('permission', '=', 'yes')->get();

        return view('admin.pages.find_talent',
            compact(
                'page_title',
                'page_description',
                'page_sub_title',
                'page_sub_group',
                'categories'
            )
        );
    }

    public function uploadftPhotos(Request $request) {
        $data = $request->only('cat_id');
        $media = $request->file('file');
        $mediaName = time().$media->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads/FindTalentPage', $mediaName, 'public');

        $imageUpload = new Ftpages;
        $imageUpload->cat_id = $data['cat_id'];
        $imageUpload->path = "storage/".$path;
        $imageUpload->save();

        $data = [
            'status' => 'success',
            'message' => $mediaName
        ];
        
        echo json_encode($data);
    }

    public function getUploadedftPhotos(Request $request) {
        $data = $request->all();
        $cat_id = $data['cat_id'];
        $ft_images = Ftpages::where('cat_id', '=', $cat_id)->orderBy('id')->get();
        $current_banner_ft_image = Ftpages::where('cat_id', '=', $cat_id)->where('selected', '=', 'yes')->first();
        if ( $request->ajax() ) {
            $data = [
                'status' => 'success',
                'message' => 'Good!',
                'data' => $ft_images,
                'current_banner_ft_image' => $current_banner_ft_image
            ];
            echo json_encode($data);
        } else {
            $data = [
                'status' => 'failed',
                'message' => 'Not Allowed to use this method!',
                'data'  => null
            ];
            echo json_encode($data);
        }
        return;
    }

    public function deleteftPhoto(Request $request) {
        $data = $request->all();
        $id = $data['id'];

        $path = public_path() . '/' . Ftpages::where('id', '=', $id)->first()->path;

        if ( file_exists($path) ) {
            @unlink($path);
            Ftpages::where('id', '=', $id)->delete();
            $data = [
                'status' => 'success',
                'message' => 'Image deleted successfully!'
            ];
        } else {
            $data = [
                'status' => 'failed',
                'message' => 'File does not exist'
            ];
        }

        echo json_encode($data);
    }

    public function selectftPhoto(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        $cat_id = $data['cat_id'];

        $selected_ft_images = Ftpages::where('cat_id', '=', $cat_id)
                                        ->where('selected', '=', 'yes')
                                        ->get();
        if ( $selected_ft_images->count() > 0 ) {
            foreach($selected_ft_images as $ft_image) {
                $ft_image_id = $ft_image->id;
                Ftpages::where('id', '=', $ft_image_id)->update(['selected' => 'no']);
            } 
        }  
        Ftpages::where('id', '=', $id)->update(['selected' => 'yes']);
        $category = DB::table('categories')->where('id', '=', $cat_id)->first();

        $data = [
            'status' => 'success',
            'message' => 'Image is selected as banner image of ' . $category->name
        ];
        echo json_encode($data);
    }
}
