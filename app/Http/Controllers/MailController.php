<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('mail');
    }

    public function sendEmail(Request $request)
    {
        $email_address = $request->input('email_address');
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ];
        Mail::to($email_address)->send(new SendMail($email_address, $data));

        return response()->json([
            'status' => 'Gửi email thành công'
        ]);
    }
}
