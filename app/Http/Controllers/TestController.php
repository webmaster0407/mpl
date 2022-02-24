<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;
use Session;

class TestController extends Controller
{
    public function __construct() {
        $this->middleware('auth')
            ->except(
                "index"
            );
    }
    //
    public function index() {
        $id = DB::table('users')
            ->insertGetId([
                'name' => 'Moltal',
                'email' => 'webmaste9392@gmail.com',
                'password' => Hash::make('root')
            ]);
        DB::table('clients')
            ->insert([
                'user_id' => $id,
                'telephone' => '121-232-2342',
                'company' => 'COLA'
            ]);

        $id = DB::table('users')
            ->insertGetId([
                'name' => 'Neo',
                'email' => 'webm803s392@gmail.com',
                'password' => Hash::make('root')
            ]);
        DB::table('clients')
            ->insert([
                'user_id' => $id,
                'telephone' => '121-232-8889',
                'company' => 'CHELSI'
            ]);

        echo "Good";
    }
}
