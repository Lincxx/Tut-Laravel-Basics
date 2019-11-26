<?php

namespace App\Http\Controllers;

use App\MAIL\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        //send an emnail
        Mail::to('test@test.com')->send(new ContactFormMail($data));

        //dd(request()->all());

        // session()->flash('message', 'Thanks for your message. We\'ll be in touch.');
        // return redirect('contact');
        //shorter way of doing the above
        return redirect('contact')->with('message', 'Thanks for your message. We\'ll be in touch.');
    }
}
