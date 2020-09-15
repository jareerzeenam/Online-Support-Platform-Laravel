@extends('layouts.master')

@section('content')

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
               <div class="pb-3">
                    <h1>Open a support ticket</h1>
               </div>
                <form action="{{ route('ticket.store') }}" method="POST">
                    @csrf
               <div class="form-group">
                   <input type="text" class=" form-control"  name="name" value="{{ old('name') }}" placeholder="Name">
                   <div class=" text-danger">{{ $errors->first('name') }}</div>
               </div>
               <div class="form-group">
                   <textarea name="description" placeholder="Problem Description" class=" form-control" value="{{ old('description') }}" cols="20" rows="8"></textarea>
                   <div class=" text-danger">{{ $errors->first('description') }}</div>
               </div>
               <div class="form-row">
                    <div class="col">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                         <div class=" text-danger">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="col">
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                         <div class=" text-danger">{{ $errors->first('phone') }}</div>
                    </div>
               </div>
               <br>
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>
            </div>
            <div class="col-sm-2">
                @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
            </div>
        </div>

@endsection
