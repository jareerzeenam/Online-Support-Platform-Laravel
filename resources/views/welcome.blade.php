@extends('layouts.master')

@section('content')

        <div class="row">

            <div class="col-sm-6">
               <div class="pb-3">
                    <h1>Open a support ticket</h1>
               </div>
                <form action="{{ route('ticket.store') }}" method="POST">
                    @csrf
               <div class="form-group">
                   <input type="text" class=" form-control"  name="name" value="{{ old('name') }}" placeholder="Full Name">
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
            <div class="col-sm-6">
                 <div class="pb-3 mobile">
                    <h1 >Already submitted a Ticket ?</h1>
                </div>

            {{-- Search Form --}}
            <form action="/search-token">
                <div class="input-group">
                    <input type="search" class=" form-control" placeholder="Enter Ticket Code" name="search">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-danger">Search</button>
                    </div>

                </div>
                 <small>Check your ticket status here</small>
            </form>
            </div>
        </div>

    {{--  Search Token Here--}}
    <div class="row pt-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

        </div>
        <div class="col-sm-2"></div>
    </div>

@endsection
