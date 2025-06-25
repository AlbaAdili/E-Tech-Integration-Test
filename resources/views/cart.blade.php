@extends("layouts/master")

@section("title", "Shopping Cart")

@section("content")
    <div class="d-flex justify-content-center mt-5">
        <h1 class="display-5 mt-4">Shopping Cart</h1>
    </div>
    <div style="padding: 70px">
        @if(session('cart') && count(session('cart')) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th></th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <tr rowId="{{ $id }}">
                                <td>
                                    @if(isset($details['image']))
                                        <img src="{{ asset('storage/' . $details['image']) }}" style="height: 150px;"/>
                                    @else
                                        <p>No Image</p>
                                    @endif
                                </td>
                                <td class="align-middle"><p class="my-auto">{{ $details['name'] }}</p></td>
                                <td class="align-middle">${{ $details['price'] }}</td>
                                <td class="align-middle">
                                    <div class="input-group">
                                        <button class="btn btn-outline-secondary quantity-btn" style="padding: 10px 15px;" data-id="{{ $id }}" data-action="decrement">-</button>
                                        <input type="text" class="form-control quantity-input text-center" value="{{ $details['quantity'] }}" style="width: 10px; border-color: #6c757d;" readonly>
                                        <button class="btn btn-outline-secondary quantity-btn" style="padding: 10px 15px;" data-id="{{ $id }}" data-action="increment">+</button>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-outline-danger delete-product" style="padding: 10px 15px;" data-id="{{ $id }}">x</button>
                                </td>
                                <td class="align-middle">${{ $details['price'] * $details['quantity'] }}</td>
                            </tr>
                            @php
                                $total += $details['price'] * $details['quantity'];
                            @endphp
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="py-5 text-end" style="font-size: 20px;">Total: ${{ $total }}</td>
                    </tr>
                </tfoot>
            </table>
        @else
            <p class="text-center mt-4">No products added in the cart.</p>
        @endif
    </div>
    <div class="d-flex justify-content-end" style="padding: 0 70px; padding-bottom: 70px;">
        <a href="{{ route('product.index') }}" class="btn button-danger me-2">Continue Shopping</a>
        @if(session('cart') && count(session('cart')) > 0)
            <a href="{{ route('product.checkout') }}" class="btn button-secondary">Continue To Checkout</a>
        @endif
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $(".quantity-btn").click(function () {
                var id = $(this).data('id');
                var action = $(this).data('action');
                var quantityInput = $(this).closest('tr').find('.quantity-input');
                var currentQuantity = parseInt(quantityInput.val());

                if (action === 'increment') {
                    quantityInput.val(currentQuantity + 1);
                } else if (action === 'decrement' && currentQuantity > 1) {
                    quantityInput.val(currentQuantity - 1);
                }

                updateCart(id, quantityInput.val());
            });

            $(".delete-product").click(function () {
                var id = $(this).data('id');
                if (confirm("Do you want to remove this product from the cart?")) {
                    deleteProduct(id);
                }
            });

            function updateCart(id, quantity) {
                $.ajax({
                    url: '{{ route('product.updateCart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        quantity: quantity
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }

            function deleteProduct(id) {
                $.ajax({
                    url: '{{ route('product.deleteFromCart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection