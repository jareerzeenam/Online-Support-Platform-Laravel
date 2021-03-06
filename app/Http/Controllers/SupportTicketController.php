<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;


class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('hello');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // !Validation
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'description' => 'required',
        ]);

        // ! Unique ID
        $unique_id = uniqid();

        // !Create
        SupportTicket::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'description' => $request['description'],
            'email' => $request['email'],
            'unique_id' => $unique_id
        ]);

        // ! Mail
        $name = $request->name;
        $email = $request->email;
        $description = $request->description;
        $subject = "Online Support";

        $data = array('name' => $name, 'email' => $email, 'description' => $description, 'unique_id' => $unique_id);
        Mail::send('mail', $data, function ($message) use ($name, $email, $subject) {
            $message->to($email, $name)->subject($subject);
            $message->from($email, 'Online Support');
        });

        // dd('Email Sent');
        return redirect()->back()->with('success', 'Ticket Added, The ticket reference number has been sent to your email');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $ticket =  SupportTicket::find($id);
        // return view('tickets.show')->with('ticket', $ticket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = SupportTicket::find($id);
        $status->status = $request->input('status');
        $status->save();

        return  redirect()->back()->with('success', 'Status Updated!');

        // dd('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportTicket $supportTicket)
    {
        //
    }

    // ! Search
    public function search(Request $request)
    {

        // !Validation
        $this->validate($request, [
            'search' => 'required',

        ]);


        $search = $request->get('search');
        $status = SupportTicket::where('unique_id', $search)->paginate(5);
        return view('status')->with('status', $status);
    }
}
