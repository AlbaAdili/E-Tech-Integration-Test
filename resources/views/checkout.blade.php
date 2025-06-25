@extends("layouts/master")

@section("title","About Page")

@section("content")
    <div class="d-flex justify-content-center mt-5">
        <h1 class="display-5">Checkout</h1>
    </div>
    <form method="POST" action="{{ route('product.processCheckout') }}" class="my-5">
        @csrf
        <div class="d-flex justify-content-around">
            <div style="max-width: 500px;">
                <h1 class="mt-4 display-6" style="font-size: 30px;">Billing Information</h1>
                <div class="form-content">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter First Name">
                    @error('firstName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-content">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter Last Name">
                    @error('lastName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-content">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="name@example.com">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-content">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="123 Main Street">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-content">
                    <label for="address2" class="form-label">Address 2 (Optional)</label>
                    <input type="text" name="address2" id="address2" class="form-control" placeholder="Apartment or suite">
                </div>
                <div class="d-flex" style="gap: 10px;">
                    <div class="form-content m-0">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country">
                        @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-content m-0">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Enter City">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-content m-0">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="number" name="zip" id="zip" class="form-control" placeholder="Enter Zip">
                        @error('zip')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-content">
                        <button type="submit" class="btn button-secondary mt-2">Process Payment</button>
                    </div>
                    <div class="form-content">
                        <a href="{{ route('product.cart') }}" class="btn button-danger mt-2 ms-2">Back To Cart</a>
                    </div>
                </div>
            </div>
            <div style="max-width: 600px;">
                @if(count($cartItems) > 0)
                    <h1 class="mt-4 display-6" style="font-size: 30px; margin-bottom: 25px;">Cart Items</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $item['image']) }}" style="height: 100px;" alt="Product Image">
                                </td>
                                <td>{{ $item['name'] }}</td>
                                <td>${{ $item['price'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>${{ $item['price'] * $item['quantity'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end py-4">Total Price:</td>
                                <td>${{ $totalCartPrice }}</td>
                            </tr>
                        </tfoot>
                    </table>
                @else
                    <p class="text-center mt-4">No products added in the cart.</p>
                @endif
            </div>
        </div>
    </form>
@endsection