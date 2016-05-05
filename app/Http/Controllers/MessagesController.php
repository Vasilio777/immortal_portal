<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $messaga = $request -> get('message');
        $username = \Auth::user()->name;

        $message = new Message();
        $message->name = $username;
        $message->messagesOfLection = $request->get('id');
        $message->email = $request->get('email');
        $message->message = $messaga;
        $message->save();

        return \Redirect::to(back()->getTargetUrl() . '#lection_comments');
    }
}
