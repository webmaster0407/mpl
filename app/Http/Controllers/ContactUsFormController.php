<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;


class ContactUsFormController extends Controller
{
    //
    public function __construct() {
        // $this->middleware('auth');
    }

    public function index() {

    }

    public function ContactUsForm(Request $request) {
        $data = $request->all();
        $id = DB::table('contacts')->insertGetId([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

        // Mail::send('email.welcome', $data, function ($message) use ($data) {
        //     $message->from($data['name'], env("APP_NAME"));
        //     $message->sender($data['name'], env("APP_NAME"));
        //     $message->to($data['email'], $data['name']);
        //     $message->subject($data['subject']);
        // });

        if ($id === null) {
            $data = [
                'status' => 'failed',
                'message' => 'Can not contact to us!, something went wrong!'
            ];
        } else {
            $data = [
                'status' => 'success',
                'message' => 'Thanks for your contact!'
            ];
        }
        echo json_encode($data);
    }

}
