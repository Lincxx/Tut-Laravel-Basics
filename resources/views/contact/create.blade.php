@extends('layouts.app')

@section('title', 'Contact Us')


@section('content')
    <h1>Contact us</h1>

    @if (! session()->has('message'))
        <form action="{{ route('contact.create') }}" method="POST">
            @csrf
            <div class="form-group ">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" value="{{old('name')}}" class="form-control">
                    <div>
                        {{$errors->first('name')}}
                    </div>
            </div>

            <div class="form-group ">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" value="{{old('email') }}" class="form-control">
                <div>
                    {{$errors->first('email')}}
                </div>
            </div>

            <div class="form-group ">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control" value="{{old('message')}}"></textarea>
                <div>
                    {{$errors->first('message')}}
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    @endif
@endsection
