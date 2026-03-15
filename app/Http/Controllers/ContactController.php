<?php

namespace App\Http\Controllers;

use App\Jobs\RecieveEmailJob;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\recieveMail;
class ContactController extends Controller
{

public function send(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    SendEmailJob::dispatch($data);
    RecieveEmailJob::dispatch($data);
        return view("emails.contact", ["data" => $data]);
    return response()->json([
        'status' => true,
        'message' => 'Email sent successfully'
    ]);
}

}
