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
                                Kuponlarım
                            </h5>

                            @if($orders == null)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        Henüz hesabına tanımlı bir kuponun bulunmuyor.
                                    </div>
                                </div>
                            @endif

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
