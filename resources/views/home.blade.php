@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <h1>Tickets</h1>
           @foreach ($tickets as $ticket)
           <div class="ticket">
            <a  href="/ticket/{{ $ticket->id }}">
                <b>{{ $ticket->name }}</b>
                <p>{{ $ticket->description }}</p>
                <p>{{ $ticket->unique_id }}</p>

                <small>{{ $ticket->created_at }}</small>
            </a>
           </div>
           @endforeach
        </div>
    </div>
</div>
@endsection
