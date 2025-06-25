@extends("layouts/master")

@section("title","Contact Page")

@section("content")
<div class="d-flex flex-column align-items-center mt-5">
    <h1 class="display-5 mt-2">Let’s Discuss Your Needs</h1>
    <p style="border-left: 3px solid #0c6efd; padding-left: 0.5rem; width: 500px;" class="mt-2">
      Tell us all about your problem right here, or send us an email at 
      <span style="color: #0c6efd;">hello@company.com</span>
    </p>
  </div>
  <form method="POST" action="{{ route('contact.store') }}" class="form" style="padding-top: 0;">
    @csrf 
    <div class="form-content">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-content">
      <label for="email" class="form-label">Email</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
      @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-content">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" class="form-control autosize" placeholder="Enter Description"></textarea>
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-content">
      <button type="submit" class="btn button-secondary mt-2">Send</button>
    </div>
  </form>
@endsection