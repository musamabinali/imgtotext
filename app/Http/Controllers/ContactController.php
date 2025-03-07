<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactUs(Request $request){

    $contact = new Contact;
    $contact->email = $request['email'];
    $contact->subject = $request['subject'];
    $contact->message = $request['message'];
    $contact->save();
    return redirect()->back()->with('success', 'Message sent successfully!');;
    }
}
