<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Session;

class HomePageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index() {
        $page_title = "Admin | Pages";
        $page_description = "Homepage Manage";
        $page_sub_title = "Homepage";
        $page_sub_group = "Pages";

        $en_blogs = DB::table('en_homepages')->get();
        $cn_blogs = DB::table('cn_homepages')->get();
        $hk_blogs = DB::table('hk_homepages')->get();

        return view('admin.pages.homepage',
            compact(
                'page_title',
                'page_description',
                'page_sub_title',
                'page_sub_group',
                'en_blogs',
                'cn_blogs',
                'hk_blogs'
            )
        );
    }

    public function getSectionDataByLocale(Request $request) {
        $data = $request->all();
        $section_number = $data['section_number'];
        $lang = $data['lang'];

        $table_name = "_homepages";
        if ( $lang == "en" ) {
            $table_name = "en" . $table_name;
        } else if ( $lang == "zh-cn" ) {
            $table_name = "cn" . $table_name;
        } else if ( $lang == "zh-hk" ) {
            $table_name = "hk" . $table_name;
        } else {
            $data = [
                'status' => 'failed',
                'message' => 'Invalid input !',
                'data' => ''
            ];
            echo json_encode($data);
            return;
        }

        $sectionData = DB::table($table_name)
                        ->where('id', '=', $section_number)
                        ->first();
        $data = [
            'status' => 'success',
            'message' => 'get data successfully',
            'data' => $sectionData
        ];

        echo json_encode($data);
        return;
    }

    public function sectionUpdate(Request $request) {
        $data = $request->all();
        
        $section_number = $data['section_number'];
        $lang = $data['lang'];
        $title = $data['title'];
        $link = $data['link'];
        $desc = $data['description'];
        $newtab = $data['newtab'];

        $table_name = "_homepages";
        if ( $lang == "en" ) {
            $table_name = "en" . $table_name;
        } else if ( $lang == "zh-cn" ) {
            $table_name = "cn" . $table_name;
        } else if ( $lang == "zh-hk" ) {
            $table_name = "hk" . $table_name;
        } else {
            $data = [
                'status' => 'failed',
                'message' => 'Invalid input!'
            ];
            echo json_encode($data);
            return;
        }

        $sectionData = DB::table($table_name)
            ->where('id', '=', $section_number)
            ->first();

        if ($sectionData === null) {
            DB::table($table_name)
                ->insert(
                    [
                        'id' => $section_number,
                        'title' => $title,
                        'link' => $link,
                        'description' => $desc,
                        'newtab' => $newtab,
                    ]
                );
        } else {
            DB::table($table_name)
                ->where('id', '=', $section_number)
                ->update(
                    [
                        'title' => $title,
                        'link' => $link,
                        'description' => $desc,
                        'newtab' => $newtab,
                    ]
                );
        }

        $data = [
            'status' => 'success',
            'message' => 'Section data updated sucessfully!'
        ];

        echo json_encode($data);
        return;
    }
}
