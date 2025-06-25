@extends("layouts/master")

@section("title","Orders Page")

@section("content")
    <div class="d-flex justify-content-center mt-4 mb-5">    
        <h1 class="display-5">Orders</h1>
    </div>
    <div class="container">
        @if ($orders->isEmpty())
            <p class="text-center pt-4">You haven't placed any orders yet.</p>
        @else
            @foreach ($orders as $order)
                <div class="card mb-5 pb-2">
                    <div class="card-header d-flex align-items-center">
                        <p class="my-2">Order Number {{ $order->id }}</p>
                    </div>
                    <div class="card-body">
                        <p>Order Details</p>
                        <p class="mb-0">Full Name: {{ $order->first_name }} {{ $order->last_name }}</p>
                        <p class="mb-0">Email: {{ $order->email }}</p>
                        <p>Full Address: {{ $order->country }}, {{ $order->city }}, {{ $order->address }}, {{ $order->zip }}</p>
                        @php
                            $totalPrice = 0;
                        @endphp
                        <div class="d-flex flex-wrap" style="gap: 20px;">
                            @foreach ($order->orderItems as $item)
                                <div class="card" style="width: 13rem;">
                                    <div style="height: 170px;"><img src="{{ asset('storage/' . $item->product_image) }}" class="px-2" style="width: 200px;" alt="{{$item->product_name}} Picture"></div>
                                    <div class="card-body d-flex flex-column">
                                        <h6>{{$item->product_name}}</h6>
                                        <p class="card-text mb-0" style="font-size: 13px;">Subtotal ${{$item->product_price}}</p>
                                        <p class="card-text mb-0" style="font-size: 13px;">Quantity {{$item->quantity}}</p>
                                        <p class="card-text mb-0" style="font-size: 13px;">Total ${{$item->total_price}}</p>
                                    </div>
                                </div>
                                @php
                                    $totalPrice += $item->total_price;
                                @endphp
                            @endforeach
                        </div>
                        <p class="mt-3 mb-0">Total Price: ${{ $totalPrice }}.00</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection