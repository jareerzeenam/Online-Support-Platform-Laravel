@extends('layouts.master')

@section('content')

<h1>{{ $ticket->name }}</h1>
<small>Created on {{ $ticket->created_at }}</small>
<br>
<small>Email {{ $ticket->email }}</small>
<br>
<p><strong>ID : </strong>{{ $ticket->unique_id }}</p>

<p><b>Description : </b> <br> {{ $ticket->description }} </p>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h1>Reply to {{ $ticket->name }}</h1>
        <form action="{{ route('reply') }}" method="POST">
             @csrf
             <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea name="reply_message" class="form-control" rows="3"></textarea>

                <input type="hidden" name="name" value="{{ $ticket->name }}">
                <input type="hidden" name="email" value="{{ $ticket->email }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>


@endsection
