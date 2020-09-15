@extends('layouts.master')

@section('content')

@if (count($status) > 0)
            @foreach ($status as $ticket)
            <div class="search-token">
                <b>Name : {{ $ticket->name }}</b>
                <p>Description : {{ $ticket->description }}</p>
                <p>Token : {{ $ticket->unique_id }}</p>
                <small>{{ $ticket->created_at }}</small>
                <div class="float-right ">
                    <p class="status">Status : {{ $ticket->status }}</p>
                </div>
                <p><strong>Support Reply : </strong> {{ $ticket->reply }}</p>
            </div>
            @endforeach

            @else
            <h1>Invalid Ticket</h1>
            <p>Please check you email for the Ticket or create a new one</p>
        @endif
        <br>
        <a href="/" class="btn btn-dark">Back</a>
@endsection
