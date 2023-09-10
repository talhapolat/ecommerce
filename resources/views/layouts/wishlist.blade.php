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

                            <h5 class="mtext-111 cl2 p-b-12" style="font-size: 15px">
                                Favorilerim
                            </h5>

                            @if($products == null)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        Henüz herhangi bir ürünü favorilere eklemedin.
                                    </div>
                                </div>
                            @endif


                            @foreach($products as $key => $product)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0" style="background-color: #f6f6f6">
                                            <img src="{{asset('storage')}}/galleries/{{$product->image}}" alt="IMG-PRODUCT">

                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="/product/{{$product->slug}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{$product->title}}
                                                </a>

                                                @if($product->sale_price != null)
                                                    <div class="left">
                                                        <span style="text-decoration: line-through" class="stext-105 cl3">{{$product->price}}<span>₺</span></span>
                                                        <span style="font-weight: bold" class="stext-105 cl3">{{$product->sale_price}}<span>₺</span></span>
                                                    </div>
                                                @else
                                                    <span class="stext-105 cl3">
								{{$product->price}}<span>₺</span>
							</span>
                                                @endif
                                            </div>

                                            {{--FAVORİ SİMGESİ--}}
                                            {{--                        <div class="block2-txt-child2 flex-r p-t-3">--}}

                                            {{--                            <?php--}}

                                            {{--                            if ($getlistNum > 0) {--}}
                                            {{--                            if (in_array($product["id"], $arraylist)) {--}}
                                            {{--                            ?>--}}
                                            {{--                            <a href="#" data-id="<?= $product["id"] ?>" class="btn-addwish-b2 dis-block pos-relative js-addedwish-b2">--}}
                                            {{--                                <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">--}}
                                            {{--                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">--}}
                                            {{--                            </a>--}}
                                            {{--                            <?php--}}
                                            {{--                            } else {--}}
                                            {{--                            ?>--}}
                                            {{--                            <a href="#" data-id="<?= $product["id"] ?>" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">--}}
                                            {{--                                <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">--}}
                                            {{--                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">--}}
                                            {{--                            </a>--}}
                                            {{--                            <?php--}}

                                            {{--                            }--}}

                                            {{--                            }--}}

                                            {{--                            ?>--}}
                                            {{--                        </div>--}}



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
