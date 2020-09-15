<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;

use Mail;
use App\Http\Requests;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = SupportTicket::orderBy('created_at', 'desc')->paginate(5);
        return view('home')->with('tickets', $tickets);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $tickets = SupportTicket::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('home')->with('tickets', $tickets);
    }

    public function show($id)
    {
        $ticket =  SupportTicket::find($id);
        return view('tickets.show')->with('ticket', $ticket);
    }

    public function reply(Request $request, $id)
    {
        // !Validation
        $this->validate($request, [
            'reply_message' => 'required',
        ]);

        $status = SupportTicket::find($id);
        $status->reply = $request->input('reply_message');
        $status->save();

        // ! Mail Reply
        $name = $request->name;
        $email = $request->email;
        $reply_message = $request->reply_message;
        // dd($reply_message);
        $subject = "Online Support Reply";

        $data = array('name' => $name, 'email' => $email, 'reply_message' => $reply_message);
        Mail::send('reply', $data, function ($reply_message) use ($name, $email, $subject) {
            $reply_message->to($email, $name)->subject($subject);
            $reply_message->from($email, 'Online Support');
        });


        // dd('Email Sent');
        return redirect()->back()->with('success', 'Replied to the Email');
    }
}
