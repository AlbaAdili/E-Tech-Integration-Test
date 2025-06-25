@extends('layouts/master') 

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <h1 class="display-5">Messages</h1>
    </div>
    <div class="container">
        <div class="my-4 d-flex" style="float: right;">
            <form method="POST" action="{{ route('contact.search') }}" class="d-flex">
                @csrf
                <input type="search" name="search" class="form-control me-2" placeholder="Search">
                <button type="submit" class="btn button-primary">Search</button>
            </form>
        </div>  
        <div class="mt-3 mb-5">
            <div class="row">
                @if(count($messages) > 0)
                    @foreach ($messages as $message)
                        <div class="border p-4 my-3">
                            <p style="font-size: 25px;" class="mb-0">{{ $message->name }}</p>
                            <p style="font-size: 17px;">{{ $message->email }}</p>
                            <p>{{ $message->description }}</p>
                            @if (Auth::user() && Auth::user()->role === 'admin')
                            <div class="card-body">
                                <div class="d-flex">
                                            <form method="POST" action="{{ route('contact.destroy', ['contact' => $message->id]) }}" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </div>
                            </div>
                            @endif  
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p class="text-center">No messages found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
