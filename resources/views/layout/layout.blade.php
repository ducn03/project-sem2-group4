<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown_home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loginMember.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signUp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/memberProfile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backToTop.css') }}">

</head>

<body style="background-color: #eeeeee83">


    @include('layout.nav-bar')

    <div class='lentop'>
        <div>
            <img src="{{ asset('img/top.png') }}" />
        </div>
    </div>

    @yield('content')


    @include('layout.footer')



    </div>

    <script src="{{ asset('js/top.js') }}"></script>
    <script src="{{ asset('js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/button.js') }}"></script>
    <script src="{{ asset('js/toast_messages.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{-- Alert --}}
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- <script src="{{ asset('js/product_button.js') }}"></script> -->
    <!-- page script -->








    {{-- cart --}}
    {{-- Dùng để lấy id --}}
    @if(session('cart'))
        @foreach (session('cart') as $id => $details)
        <input hidden name="listCart" value="{{ $details['id'] }}" type="text">
        @endforeach
    @endif

    {{-- end cart --}}

    <script type="text/javascript">
        // Lấy danh sách id từ session đã lưu để kiểm tra sản phẩm đã tồn tại trong cart hay chưa KHI REFRESH hay MỚI SỬ DỤNG
        const listId = [];
        var count = document.getElementsByName("listCart").length;
        for(i = 0; i < count; i++){
            listId.push(document.getElementsByName("listCart")[i].value);
        }


        function RenderCart(response) {
            var countCart = document.getElementById("countCart").value;
            var countCartAdd1 = countCart * 1 + 1;
            document.getElementById("total-quanty-show").innerHTML = countCartAdd1;
            document.getElementById("countCart").value = countCartAdd1;
        }

        function Cart(id) {
            $.ajax({
                url: '/project-sem2/public/home/add-to-cart/' + id,
                type: 'GET',
            }).done(function(response) {

                // Kiểm tra sản phẩm đã có trong cart chưa nếu rồi thì trả về false
                var check = true;
                for (i = 0; i < listId.length; i++) {
                    if (listId[i] == id) {
                        check = false;
                    }
                }
                listId.push(id);

                console.log(response);

                if (check != false) {
                    RenderCart(response);
                    alertify.success('New product added');
                    return;
                }
                alertify.success('The number of products has increased by 1');
            });

        }
    </script>
    @yield('script-section')

</body>

</html>
