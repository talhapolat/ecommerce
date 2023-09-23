<!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                Adreslerim
                            </h5>

                            @if($addresses == null)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        Henüz kayıtlı bir adresin yok.
                                    </div>
                                </div>
                            @else
                                @foreach ($addresses as $address)
                                    <div class="card mb-2">
                                        <div class="card-body" style="font-family: Poppins-Regular">
                                            <h5 class="mtext-111 cl2 p-b-8" style="font-size: 15px">
                                                {{$address->title}}
                                            </h5>
                                            <h6>{{$address->name}} {{$address->surname}}</h6>
                                            <a style="font-size: 12px">{{$address->phone}}</a> <br>
                                            <a>{{$address->address}}</a> <br>
                                            <a style="font-size: 12px">{{$address->city}} / </a>
                                            <a style="font-size: 12px;">{{$address->state}}</a>
                                            <a href="#"><i class="fa fa-x"
                                                                  style="float: right;font-size: 18px; color: black"></i></a>
                                            <a href="#"><i class="fa fa-edit mr-2 "
                                                                  style="float: right;font-size: 18px; color: black"></i></a>
                                        </div>
                                    </div>
                                @endforeach
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
