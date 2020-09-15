@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <h1>Tickets</h1>

            {{-- Search Form --}}
            <form action="/search">
                <div class="input-group">
                    <input type="search" class=" form-control" name="search" placeholder="Customer Name">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-danger">Search</button>
                    </div>
                </div>
            </form>

        @if (count($tickets) > 0)
            @foreach ($tickets as $ticket)
            <div class="ticket">
                <a  href="/show/{{ $ticket->id }}">
                    <b>{{ $ticket->name }}</b>
                    <p>{{ $ticket->description }}</p>
                    <p>Ticket : {{ $ticket->unique_id }}</p>
                    <small>Status : {{ $ticket->status }}</small>
                    <br>
                    <small>{{ $ticket->created_at }}</small>
                </a>
            </div>
            @endforeach

            @else
            <h1>No Tickets Found</h1>
        @endif
        {{ $tickets->links() }}
        </div>
    </div>
</div>

@endsection
