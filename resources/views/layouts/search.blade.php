<!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')
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
{{--@include('layouts.partials.products')--}}

<div class="bg0 p-t-45 p-b-140">
    <div class="p-t-10">

    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="icon-header-item cl2 pl-3 trans-04 js-show-modal-search" style="border-bottom: 2px solid;">
                    <i class="zmdi zmdi-search p-b-4" >
                        <a style="font-family:Poppins-Medium; padding-bottom: 8px!important;">{{$search}}</a>
                    </i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="search-category-list">
                    <li><a href="#home" style="font-weight: bold">Tümünü Keşfet ({{count($products)}})</a></li>
{{--                    @if($categories != null)--}}
{{--                        @foreach($categories as $key => $category)--}}
{{--                    <li><a href="#news">{{$category->name}} (19)</a></li>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
                </ul>
            </div>
        </div>
        <div class="row isotope-grid mt-5">

                @if($products != null)

                    @foreach($products as $key => $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{asset('storage')}}/{{$product->image}}" alt="IMG-PRODUCT">

                                    <a href="#" data-id="{{$product->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Hızlı Bakış
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="/product/{{$product->slug}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{$product->title}}
                                        </a>

                                        <span class="stext-105 cl3">
								{{$product->price}}<span>₺</span>
							</span>
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
                @endif
            </div>
    </div>
</div>

@include('layouts.partials.footer')
@include('layouts.partials.modalproduct')
@include('layouts.partials.modalcart')
@include('layouts.partials.jsassets')

</body>

</html>
