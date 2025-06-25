@extends("layouts/master")

@section("title","Shop Page")

@section("content")
    <div class="text-center mt-5">
        <h1 class="display-5 mt-2">Shop Products</h1>
    </div>
    @if (Auth::user() && Auth::user()->role === 'admin')
        <a href="{{ route('product.create') }}" class="btn button-primary mt-4" style="margin: 0 70px;">Add Product</a>
    @endif
    <div class="mt-5 d-flex justify-content-between" style="margin: 0 70px;">
        <div class="mt-3">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="{{ route('shop') }}" class="category-link">All</a></li>
                <li class="list-inline-item"><a href="{{ route('shop', ['category' => 'Apple']) }}" class="category-link">Apple</a></li>
                <li class="list-inline-item"><a href="{{ route('shop', ['category' => 'Sony']) }}" class="category-link">Sony</a></li>
                <li class="list-inline-item"><a href="{{ route('shop', ['category' => 'Logitech']) }}" class="category-link">Logitech</a></li>
                <li class="list-inline-item"><a href="{{ route('shop', ['category' => 'Samsung']) }}" class="category-link">Samsung</a></li>
            </ul>
        </div>
        <form method="POST" action="{{ route('product.search') }}" class="d-flex">
            @csrf
            <input type="search" name="search" class="form-control me-2" placeholder="Search">
            <button type="submit" class="btn button-primary">Search</button>
        </form>
    </div>
    <div class="card-container py-5">
        @if(isset($products) && $products->count() > 0)
            @foreach($products as $product)
                @if(request('category') && !Str::contains($product->name, request('category')))
                    @continue
                @endif
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
            <div style="width: 90%">
                @if($products->count() > 0)
                    {!! $products->links('pagination::bootstrap-5') !!}
                @endif
            </div>
        @else
            <p class="display-6">No products found.</p>
        @endif
    </div>
@endsection