<!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

<body class="animsition">


<!-- BACK TO TOP -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>
<!-- END -->

<!-- CONTENT -->
@include('layouts.partials.header')


<div class="container" style="margin-top: 150px; margin-bottom: 150px">
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <div class="card">
                <div class="card-header"
                     style="background-color: #116c7f; color: #f2f1e9; background-image: url('/images/icons/logo-01.png'); background-repeat: repeat; ">
                    <h5><b>HESABIM</b></h5>
                </div>
                @include('layouts.partials.accountsidebar')
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            <!-- ----------------- START ------------------ -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <h5 class="mtext-111 cl2 p-b-8" style="font-size: 15px">
                                Siparişlerim
                            </h5>

                            @if($orders == null)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        Henüz tanımlı bir adresin bulunmuyor.
                                    </div>
                                </div>
                            @endif

                            @foreach ($orders as $order)

                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8 col-xs">
                                                <div class="row ">

                                                    @php($ordersp = \App\Models\OrderDetails::all()->where('order_id', $order->id))

                                                    @foreach ($ordersp as $key => $orderp)
                                                        <div class="col-3">
                                                            <img src="{{$orderp->product_image}}"
                                                                 class="img-thumbnail mb-1 mt-1" style=""
                                                                 alt="...">
                                                            <br>
                                                            <div style="float: right;">
                                                                <small class="stext-105 cl4"
                                                                       style="font-size:12px">x {{$orderp->product_quantity}}</small>
                                                            </div>

                                                            <div style="float: left;">
                                                                @if($orderp->product_option1 != null)
                                                                    <small class="stext-105 cl4"
                                                                           style="font-size:10px">{{$orderp->product_option1}}</small>
                                                                @endif
                                                                @if($orderp->product_option2 != null)
                                                                    <small class="stext-105 cl4"
                                                                           style="font-size:10px">
                                                                        | {{$orderp->product_option2}}</small>
                                                                @endif
                                                                @if($orderp->product_option1 == null && $orderp->product_option2 == null)
                                                                    <small class="stext-105 cl4"
                                                                           style="font-size:10px">
                                                                        STANDART</small>
                                                                @endif
                                                            </div>
                                                            <br>
                                                            <small class="stext-105 cl4"
                                                                   style="font-size:11px">{{$orderp->product_price}}₺</small>
                                                        </div>

                                                    @endforeach

                                                </div>

                                            </div>
                                            <div class="col-md-4 col-xs">
                                                <div style="float: right;">

                                                    <h5 class="mtext-111 cl2 p-b-8" style="font-size: 13px;font-family: Poppins-Regular">
                                                        Sipariş Tarihi: {{$order->created_at}}</h5>
                                                    <h5 class="mtext-111 cl2 p-b-8" style="font-size: 13px;font-family: Poppins-Regular">
                                                        Sipariş No: #{{$order->order_number}}</h5>
                                                    <h5 class="mtext-111 cl2 p-b-8" style="font-size: 13px;font-family: Poppins-Regular">
                                                        Durumu:
                                                        @if($order->payment_statu == 0)
                                                            <span style="color: #d48d06">Ödeme Bekleniyor</span>
                                                        @elseif($order->payment_statu == 1 and $order->order_statu == 0)
                                                            <span style="color: green">Sipariş Hazırlanıyor</span>
                                                        @elseif($order->payment_statu == 1 and $order->order_statu == 1)
                                                            <span style="color: green">Kargoya Verildi</span>
                                                        @elseif($order->payment_statu == 1 and $order->order_statu == 2)
                                                            <span style="color: green">Teslim Edildi</span>
                                                        @endif
                                                    </h5>
                                                    @if($order->order_delivery_cost > 0)
                                                    <h5 class="mtext-111 cl2 p-b-8" style="font-size: 13px;font-family: Poppins-Regular">
                                                        Teslimat Ücreti: {{$order->order_delivery_cost}}₺</h5>
                                                    @endif
                                                    @if($order->order_payment_cost > 0)
                                                    <h5 class="mtext-111 cl2 p-b-8" style="font-size: 13px;font-family: Poppins-Regular">
                                                        Ödeme Komisyonu: {{$order->order_payment_cost}}₺</h5>
                                                    @endif
                                                    <h5 class="mtext-111 cl2 p-b-8" style="font-size: 13px;font-family: Poppins-Regular">
                                                        Toplam Tutar: {{$order->order_total_price}}₺</h5>
{{--                                                    <button type="submit" class="btn"--}}
{{--                                                            style="background-color: #116c7f; color: #fff; border: none; width: 100%; height: 40px">--}}
{{--                                                        <h5 class="mtext-111"--}}
{{--                                                            style="font-size: 15px; color: #fff">--}}
{{--                                                            Sipariş Detayı--}}
{{--                                                        </h5>--}}
{{--                                                    </button>--}}

                                                    <a href="" style="color: black; font-size: 13px">Sipariş Detayı</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.partials.footer')

@include('layouts.partials.modalcart')
@include('layouts.partials.jsassets')

</body>

</html>
