<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('storage/template/manage/vendor/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @include('layouts.manage.managepartials.managehead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="page">
    <!-- Main Navbar-->
    {{--    @include('layouts.manage.managepartials.manageheader')--}}

    <div class="page-content d-flex align-items-stretch">

        @include('layouts.manage.managepartials.managenavbar')

        <div class="content-inner w-100">
            <!-- Page Header-->
            <header class="bg-white shadow-sm px-4 py-3 z-index-20">
                <div class="container-fluid px-0">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0 p-1">Siparişler</h2>
                        </div>
                        <div class="col justify-content-end" style="display: flex;">
                            <button class="btn btn-primary"><a href="/manage/orders/new" style="color: white">+ Yeni
                                    Sipariş</a></button>
                        </div>
                    </div>


                </div>
            </header>


            <!-- Dashboard Counts Section-->
            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row gx-5 bg-white">

                                <div class="table-responsive">


                                    <table class="table" id="datatable1" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Sipariş No</th>
                                            <th>Müşteri</th>
                                            <th>Toplam Tutar</th>
                                            <th>Sipariş Tarihi</th>
                                            <th>Ödeme Durumu</th>
                                            <th>Sipariş Durumu</th>
                                            <th style="text-align: right">İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($orders as $key => $order)

                                            <tr class="manageproductable">
                                                <td>
                                                    <span><a href="{{route('manageordersedit', $order->order_number)}}"
                                                             style="color: #0b0b0b">{{$order->order_number}}</a></span>
                                                </td>
                                                <td>
                                                    <span>{{$order->order_ship_name}} {{$order->order_ship_surname}}</span>
                                                    <br>
                                                    <span>{{$order->order_ship_email}}</span>
                                                </td>
                                                <td>
                                                    <span>{{$order->order_amount}} ₺</span> <br>

                                                    <span>{{$ordersdscount[$order->order_number]}} ürün</span>

                                                </td>
                                                <td>
                                                    {{date_format($order->created_at, "d/m/Y H:i")}}
                                                </td>
                                                <td>
                                                    @if($order->payment_statu == 0)
                                                        <span
                                                            style="background-color: rgb(252,243,228); color: #f3a63f; padding: 5px 8px;border: 0px; border-radius: 4%">Ödeme Bekleniyor</span>
                                                    @elseif($order->payment_statu == 1)
                                                        <span
                                                            style="background-color: #efedff; color: #83acff; padding: 5px 8px;border: 0px; border-radius: 4%"> <i
                                                                class="fa-regular fa-circle-check"></i> Ödeme Onaylandı</span>
                                                    @elseif($order->payment_statu == 2)
                                                        <span
                                                            style="background-color: rgba(213,140,213,0.51); color: purple; padding: 5px 8px;border: 0px; border-radius: 4%"><i class="fa-solid fa-rotate-left"></i> İade Edildi</span>
                                                    @else
                                                        <span>Bilinmiyor</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($order->order_statu == 0)
                                                        <span
                                                            style="background-color: #efedff; color: #83acff; padding: 5px 8px;border: 0px; border-radius: 4%">Sipariş Oluşturuldu</span>
                                                    @elseif($order->order_statu == 1)
                                                        <span
                                                            style="background-color: #e7faee; color: #37c376; padding: 5px 8px;border: 0px; border-radius: 4%"><i class="fa-solid fa-truck-fast"></i> Gönderildi</span>
                                                    @elseif($order->order_statu == 2)
                                                        <span
                                                            style="background-color: #e7faee; color: #37c376; padding: 5px 8px;border: 0px; border-radius: 4%"> <i
                                                                class="fa-regular fa-circle-check"></i> Teslim Edildi</span>
                                                    @elseif($order->order_statu == 3)
                                                        <span
                                                            style="background-color: rgba(213,140,213,0.51); color: purple; padding: 5px 8px;border: 0px; border-radius: 4%">İade Edildi</span>
                                                    @else
                                                        <span>Bilinmiyor</span>
                                                    @endif

                                                </td>

                                                <td style="text-align: right">
                                                    <span><a href="{{route('manageordersedit', $order->order_number)}}"
                                                             style="color: #0b0b0b">Detaylar</a></span>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Dashboard Content Section    -->
            <section class="pb-0">
                <div class="container-fluid">
                    <div class="row align-items-stretch">


                    </div>
                </div>
            </section>


            <!-- Page Footer-->
            <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs"
                    id="footer">
                <div class="container-fluid">
                    <div class="row gy-2">
                        <div class="col-sm-6 text-sm-start">
                            <p class="mb-0">Your company &copy; 2017-2022</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <p class="mb-0">Version 2.1.0</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('storage/template/manage/vendor/simple-datatables/umd/simple-datatables.js')}}"></script>

@include('layouts.manage.managepartials.managefooter')

</body>

<script>
    function deleteProduct($product_id) {
        var product_id = $product_id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/delete/" + product_id,
            method: 'POST',
            data: {
                product_id: product_id
            },

            success: function (response) {
                // $(form).trigger("reset");
                toastr.success('Ürün silindi.', response, {
                    timeOut: 1000,
                    closeButton: true
                });
                location.reload();
            },
            error: function (response) {
                alert("hata");
            }
        });
    }
</script>

<script>
    document.getElementById('managenavbar').children.item(4).classList.add('active');
</script>


</html>
