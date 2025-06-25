@extends("layouts/master")

@section("title","Signout Page")

@section("content")
    <form action="{{ route('signout.custom') }}" method="POST">
        @csrf
        <div class="my-5" style="margin-left: 70px;">
            <h1 class="display-6">Are you sure you want to logout?</h1>
            <button type="submit" class="btn button-primary mt-3">Logout</button>
        </div>
    </form>
@endsection