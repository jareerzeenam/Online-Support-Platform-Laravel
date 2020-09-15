@extends('layouts.master')

@section('content')


<div class="row">
    <div class="col-sm-6">
        <h1>{{ $ticket->name }}</h1>
        <small>Created on {{ $ticket->created_at }}</small>
        <br>
        <small>Email {{ $ticket->email }}</small>
        <br>
        <p><strong>ID : </strong>{{ $ticket->unique_id }}</p>

        <p><b>Description : </b> <br> {{ $ticket->description }} </p>
        <p><b>Status : </b> <br> {{ $ticket->status }} </p>
    </div>
    {{-- Status Update --}}
    <div class="col-sm-6">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Status</label>
        </div>
        <form action="{{ route('ticket.update', $ticket->id)}}" method="POST">
            <select class="custom-select" name="status" id="inputGroupSelect01">
                <option value="Pending">Pending</option>
                <option value="On Progress">On Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        {{ method_field('PUT') }}
        @csrf
        <button type="submit" class="btn btn-outline-info">Update Status</button>
        </form>
    </div>
</div>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h1>Reply to {{ $ticket->name }}</h1>
        <form action="{{ route('reply',$ticket->id) }}" method="POST">

             <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea name="reply_message" class="form-control" rows="3"></textarea>
                  <div class=" text-danger">{{ $errors->first('reply_message') }}</div>

                <input type="hidden" name="name" value="{{ $ticket->name }}">
                <input type="hidden" name="email" value="{{ $ticket->email }}">
            </div>
        {{-- {{ method_field('PUT') }} --}}
        @csrf
            <button type="submit" class="btn btn-primary">Reply Email</button>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>


@endsection
