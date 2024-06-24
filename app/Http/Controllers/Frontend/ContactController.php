<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\NotificationHelper;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.userfront.about_us');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'description' => 'required',
        ]);
        $contact = new \App\Models\Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->description = $request->description;
        $contact->save();
        NotificationHelper::show('Your message has been sent successfully','success');
        return redirect()->back();
    }
    
}
