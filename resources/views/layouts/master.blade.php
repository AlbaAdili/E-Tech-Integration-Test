<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>@yield("title","Master Page")</title>
</head>
<body>
    <svg class="d-none">
        <symbol id="cart" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        <symbol id="twitter" viewBox="0 0 16 16">
          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
        </symbol>
        <symbol id="instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
        </symbol>
        <symbol id="facebook" viewBox="0 0 16 16">
          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
        </symbol>
        <symbol id="heart" viewBox="0 0 16 16">
          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </symbol>
        <symbol id="heart-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </symbol>
    </svg>
    <header>
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0">
                <a href="{{ route('home.index') }}" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="{{ asset('images/logo.svg') }}" alt="Project Logo">
                </a>
                </div>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home.index') }}" class="nav-link px-2">Home</a></li>
                <li><a href="{{ route('about') }}" class="nav-link px-2">About</a></li>
                <li><a href="{{ route('product.index') }}" class="nav-link px-2">Shop</a></li>
                <li><a href="{{ route('faqs.index') }}" class="nav-link px-2">FAQs</a></li>
                <li><a href="{{ Auth::user() && Auth::user()->role === 'admin' ? route('contact.index') : route('contact.create') }}" class="nav-link px-2">Contact</a></li>
                @if (Auth::user())
                  <li><a href="{{ route('order.index') }}" class="nav-link px-2">Orders</a></li>
                @endif
                </ul>
                <div class="col-lg-3 text-end">
                @if (Auth::user())
                  <a href="{{ route('signout.confirmation') }}"><button type="button" class="btn button-secondary">Logout</button></a>
                @else
                  <a href="{{ route('login') }}"><button type="button" class="btn button-primary me-2">Login</button></a>
                  <a href="{{ route('register') }}"><button type="button" class="btn button-secondary">Register</button></a>
                @endif
                @unless (Auth::user() && Auth::user()->role === 'admin')
                  <a href="{{ auth()->check() ? route('product.cart') : route('login') }}">
                    <svg class="bi bi-cart ms-1" width="30" height="30" fill="#0c6efd"><use xlink:href="#cart"/></svg>
                    <span class="quantity">{{ count((array) session('cart')) }}</span>
                  </a>
                @endunless
                </div>
            </div>
        </div>
    </header>
    <main>
        @section("content")

        @show
    </main>
    <footer>
      <div class="container border-top">
        <div class="row pt-5">
          <div class="col-6 col-md-2 mb-3">
            <h5>Site Links</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="{{ route('home.index') }}" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="{{ route('about') }}" class="nav-link p-0 text-body-secondary">About</a></li>
            <li class="nav-item mb-2"><a href="{{ route('product.index') }}" class="nav-link p-0 text-body-secondary">Shop</a></li>
            <li class="nav-item mb-2"><a href="{{ route('faqs.index') }}" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="{{ route('contact.create') }}" class="nav-link p-0 text-body-secondary">Contact</a></li>
          </div>
          <div class="col-6 col-md-2 mb-3">
            <h5>FAQs</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="{{ route('faqs.index') }}#payment" class="nav-link p-0 text-body-secondary">Payment</a></li>
            <li class="nav-item mb-2"><a href="{{ route('faqs.index') }}#tracking" class="nav-link p-0 text-body-secondary">Track order</a></li>
            <li class="nav-item mb-2"><a href="{{ route('faqs.index') }}#return-exchange" class="nav-link p-0 text-body-secondary">Return and Exchange</a></li>
            <li class="nav-item mb-2"><a href="{{ route('faqs.index') }}#warranty" class="nav-link p-0 text-body-secondary">Warranty</a></li>
            <li class="nav-item mb-2"><a href="{{ route('faqs.index') }}#international-shipping" class="nav-link p-0 text-body-secondary">International shipping</a></li>
          </div>
          <div class="col-6 col-md-2 mb-3">
            <h5>Customer Support</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Email:</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">contact@company.com</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Phone:</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">+389 (0) 71 226 208</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Tetovo, North Macedonia</a></li>
          </div>
          <div class="col-md-5 offset-md-1 mb-3">
          <form id="newsletterForm" action="{{ route('subscribe.newsletter') }}" method="post">
              @csrf
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                  <label for="newsletterEmail" class="visually-hidden">Email address</label>
                  <input id="newsletterEmail" name="email" type="text" class="form-control" placeholder="Email address">
                  <button class="btn btn-primary" type="submit">Subscribe</button>
              </div>
              @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </form>
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 my-4 border-top">
          <p>&copy; 2024 E Tech. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
          </ul>
        </div>
      </div>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
    @yield('scripts')
</body>
</html>