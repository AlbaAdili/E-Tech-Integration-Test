@extends("layouts/master")

@section("title","Home Page")

@section("content")
    <section class="video-section">
        <div class="video-container">
          <video autoplay loop muted class="video-background">
            <source src="{{ asset('images/Macbook-Video-Presentation.webm') }}" type="video/webm">
          </video>
        </div>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
          <div class="col-md-6 p-lg-5 mx-auto my-5">
            <h1 class="display-3 fw-bold text-white">Discover the Future of Tech</h1>
            <h3 class="mb-3 fw-normal text-white">Shop Technology Latest Arrivals Online</h3>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
              <a class="icon-link text-white" href="{{ route('about') }}">
                Learn more
                <svg class="bi bi-cart text-white" width="16" height="16"><use xlink:href="#chevron-right"/></svg>
              </a>
              <a class="icon-link text-white" href="{{ route('product.index') }}">
                Buy
                <svg class="bi bi-cart text-white" width="16" height="16"><use xlink:href="#chevron-right"/></svg>
              </a>
            </div>
          </div>
        </div>
    </section> 
    <section>
      <div class="card-container py-5">
        @php
          $featuredProducts = (new \App\Http\Controllers\ProductController)->featuredProducts();
        @endphp
        @if(isset($featuredProducts) && $featuredProducts->count() > 0)
            @foreach($featuredProducts as $product)
                <div class="card" style="width: 18rem;">
                    @if (Auth::user() && Auth::user()->role === 'admin')
                        <div class="card-body">
                            <div class="d-flex">
                                <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn button-warning">Edit</a>
                                <form method="POST" action="{{ route('product.destory', ['product' => $product->id]) }}" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn button-danger ms-2">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div style="height: 250px;"><img src="{{ asset('storage/' . $product->image) }}" class="card-img-top px-2" alt="{{$product->name}} Picture"></div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{$product->name}}</h5>
                        @if($product->quantity > 0)
                          <p class="card-text">${{$product->price}}</p>
                          @unless (Auth::user() && Auth::user()->role === 'admin')
                            <a href="{{ auth()->check() ? route('product.addToCart', $product->id) : route('login') }}" class="btn button-secondary mt-auto" style="width: 103px;">Add to cart</a>
                          @endunless
                        @else
                          <button class="btn button-secondary mt-auto" style="background-color: #c82333; width: 115px;">Out of stock</button>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p class="display-6">No products found.</p>
        @endif
      </div>
    </section>
    <section>
      <div class="px-4 py-5 mt-5 text-center border-top">
        <h1 class="display-5 text-body-emphasis">About Us</h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4 pt-2">Whether you're an enthusiast for technology, a professional seeking best-in tools, or simply someone who loves the convenience of technology, we're here to meet your needs. Explore our carefully chosen selection of products, and experience the future of tech with us.</p>
          <div class="d-grid d-sm-flex justify-content-sm-center mb-5">
            <a href="{{ route('about') }}"><button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Read more</button></a>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4" onclick="backToTop()">Back to top</button>
          </div>
        </div>
        <div class="overflow-hidden">
          <div class="container px-5">
            <img src="{{ asset('images/apple-newsroom.png') }}"" class="img-fluid rounded-3" alt="Apple Newsroom" width="700" height="500" loading="lazy">
          </div>
        </div>
      </div>
    </section>
@endsection