<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index(){
        return view('clinic.users.contact');
    }

    public function store(MessageRequest $request){

        Message::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'subject'    => $request->subject,
            'content'    => $request->content
        ]);

        return redirect()->route('contact.index')->with('success', 'Your Message Has Been Send');
    }
}
