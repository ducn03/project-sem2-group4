@extends('layout.layout')
@section('title', 'OrganicFood')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/alertDelete.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alert.css') }}">
    {{-- <script src="{{ asset('js/alertDelete.js') }}"></script> --}}

    <br>
    <nav class="grid wide bg_white_container">

        @if (session('success'))
            {{-- Thông báo bỏ sản phẩm khỏi giỏ hàng thành công --}}
            <input hidden id="check" type="text" value="delete" />
            <script src="{{ asset('js/alert.js') }}"></script>

            {{-- <div class="alert alert-success">
                 {{ session('success') }}
            </div> --}}
        @endif

        @if (session('success2'))
            {{-- Thông báo thay đổi số lượng sản phẩm trong giỏ hàng thành công --}}
            <input hidden id="check" type="text" value="update" />
            <script src="{{ asset('js/alert.js') }}"></script>
        @endif

        <table id="cart" class="table table-hover ">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>

                <?php $total = 0; ?>

                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <?php $total += $details['price'] * $details['quantity']; ?>

                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="{{ url('images/' . $details['image']) }}"
                                            width="100" height="100" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">${{ $details['price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity"
                                    min="1" max="100"
                                    oninput="this.value = !!this.value && Math.abs(this.value) >= 1 && Math.abs(this.value) <= 100 ? Math.abs(this.value) : null" />
                            </td>
                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}
                            </td>
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i
                                        class="update_cart fa fa-refresh"></i></button>
                                {{-- class alert-from-cart là để gọi thông báo delete --}}
                                <button class="btn btn-danger btn-sm alert-from-cart" data-id="{{ $id }}"><i
                                        class="remove_cart fa fa-trash-o"></i></button>

                                {{-- ALERT DELETE --}}
                                    <div class="cd-popup {{ $id }}" role="alert">
                                        <div class="cd-popup-container">
                                            <p>Are you sure you want to delete this?</p>
                                            <ul class="cd-buttons">
                                                {{-- class remove-from-cart để gọi hàm bỏ sản phẩm ra khỏi giỏ hàng --}}
                                                <li><a class="remove-from-cart" data-id="{{ $id }}"
                                                        href="#0">Yes</a></li>
                                                <li><a class="cd-popup2" href="#0">No</a></li>
                                            </ul>
                                            <a href="#0" class="cd-popup-close img-replace">Close</a>
                                        </div> <!-- cd-popup-container -->
                                    </div> <!-- cd-popup -->
                                {{-- END DELETE ALERT --}}
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total {{ $total }}</strong></td>
                </tr>
                <tr>
                    <td><a href="{{ url('/') }}" class="continue_shopping_cart"><i class="fa fa-angle-left"></i>
                            Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                </tr>
            </tfoot>
        </table>


        <script type="text/javascript">
            // CLOSE ALERT
            jQuery(document).ready(function($) {
                //close popup
                $('.cd-popup').on('click', function(event) {
                    if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                        event.preventDefault();
                        $(this).removeClass('is-visible');
                    }
                });
                //close popup when clicking the esc keyboard button
                $(document).keyup(function(event) {
                    if (event.which == '27') {
                        $('.cd-popup').removeClass('is-visible');
                    }
                });
                $('.cd-popup2').on('click', function(event) {
                    event.preventDefault();
                    $('.cd-popup').removeClass('is-visible');
                });
            });
            //END CLOSE ALERT

            // UPDATE CART

            $(".update-cart").click(function(e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: "{{ url('home/update-cart') }}",
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            // END UPDATE CART

            // ALERT REMOVE CART
            $(".alert-from-cart").click(function(e) {
                var id = $(this).attr("data-id");
                e.preventDefault();
                $('.'+id).addClass('is-visible');

            });
            // END ALERT REMOVE CART

            // REMOVE CART

            $(".remove-from-cart").click(function(e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: "{{ url('home/remove-from-cart') }}",
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });

                //Nếu dùng confirm

                // if (confirm("Are you sure")) {
                //     $.ajax({
                //         url: "{{ url('home/remove-from-cart') }}",
                //         method: "DELETE",
                //         data: {
                //             _token: '{{ csrf_token() }}',
                //             id: ele.attr("data-id")
                //         },
                //         success: function(response) {
                //             window.location.reload();
                //         }
                //     });
                // }
            });
            // END REMOVE CART
        </script>

    </nav>


    <!--checkOut-->
    <div class="grid wide">
        <div style="border-bottom:1px solid"></div><br>
        <h2>Order</h2><br>
        <form action="{{ url('home/storeOrder') }}" method="POST">
            @csrf
            <div class="row">

                @if (session('member'))
                    <input type="hidden" name="member_id" id="member_id" value="{{ session('member')->id }}">
                    <input type="hidden" name="shipping_email" id="shipping_email" value="{{ session('member')->email }}">
                    <input type="hidden" name="name" id="name" value="{{ session('member')->fullname }}">
                @endif

                @php
                    use Carbon\Carbon;
                    // date_default_timezone_set('Asia/Saigon');
                    $mytime = Carbon::now();
                    $disable = session('cart') ? '' : 'disabled';
                @endphp
                <input type="hidden" name="date" id="date" value="{{ $mytime }}">
                <input type="hidden" value="{{ $total }}" name="total_amount" id="total_amount">

                @if (!session('member'))
                    <div class="col l-6 m-6 c-12">
                        Name: <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="col l-6 m-6 c-12">
                        Email: <input class="form-control" type="text" name="shipping_email" id="shipping_email"
                            required>
                    </div>
                @endif

                <div class="col l-6 m-6 c-12">
                    Address: <input class="form-control" type="text" name="shipping_address" id="shipping_address"
                        required>
                </div>
                <div class="col l-6 m-6 c-12">
                    Phone: <input class="form-control" type="text" name="phone" id="phone" required>
                </div>
                <div class="col l-6 m-6 c-12">
                    Note:
                    <textarea class="form-control" name="note" id="note" value="no notes"></textarea>
                </div>
                <div class="col l-6 m-6 c-12">

                </div>

                <div>
                    <h3>Payment methods</h3>
                    <input name="payment_term" id="payment_term" type="radio" value="0" checked> cash payment
                    &nbsp&nbsp&nbsp
                    <input name="payment_term" id="payment_term" type="radio" value="1"> online paying
                    <br>
                    <h3>Total</h3>
                    Total: ${{ $total }}
                    <br><br>
                    <button
                        style="padding:5px 10px 5px 10px; border:none; color:#fff; background-color:#33CC33; border-radius:15px; font-size:larger;"
                        {{ $disable }}>Pay</button>
                </div>
            </div>
        </form>

    </div>

@endsection
@section('script-section')


@endsection
