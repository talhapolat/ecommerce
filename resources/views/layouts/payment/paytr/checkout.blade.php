<!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>

<!-- BACK TO TOP -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>
<!-- END -->


<div class="container checkoutlogo">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <a href="/" class="logo">
                    <img src="{{asset('storage/template/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>
            </div>

        </div>

        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto checkoutlogobottom">

        </div>
    </div>

</div>

<div class="container bg0 p-b-85">

    <div class="row">
        <div class=" col-lg-10 col-xl-6 m-lr-auto m-b-50" style="min-height: 400px">

            <div style="width: 100%;margin: 0 auto;display: table;">

                    <!-- Ödeme formunun açılması için gereken HTML kodlar / Başlangıç -->
                <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
                <script>iFrameResize({},'#paytriframe');</script>
                <!-- Ödeme formunun açılması için gereken HTML kodlar / Bitiş -->

            </div>

        </div>
    </div>
</div>



<br><br>
</body>
</html>
