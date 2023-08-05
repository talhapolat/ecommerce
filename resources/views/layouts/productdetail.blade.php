<?php
session_start();
ob_start();

//$url = $_SERVER["REQUEST_URI"];
//$slug = explode("/", $url);
//
//
//if (isset($user)) {
//    $isFavQuery = $dbConnect->prepare("SELECT * FROM favorites WHERE product_id = ? and user_id = ?");
//    $isFavQuery->execute([$product['id'], $user['id']]);
//    $isFavNum = $isFavQuery->rowCount();
//    $isFavProduct = $isFavQuery->fetch(PDO::FETCH_ASSOC);
//} else {
//    $isFavNum = 0;
//}
//
//
//if ($isFavNum == 1) {
//    $isFav = true;
//} else {
//    $isFav = false;
//}
//
//
require_once app_path('func.php');

?>

    <!DOCTYPE html>
<html>

<head>
    <title> {{ $product->title }}</title>
    <link rel="stylesheet" type="text/css" href="/Template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    @include('layouts.partials.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
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


<!-- breadcrumb -->
<div class="container p-d-container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        @if($productcategory!=null)
        <a href="/category/{{ $productcategory->id }}" class="stext-109 cl8 hov-cl1 trans-04">
            {{ $productcategory->name }}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        @endif

        <span class="stext-109 cl4">
				{{ $product->title }}
			</span>
    </div>
</div>

<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">

{{--                            <div class="item-slick3 yeyeye" data-thumb="/storage/{{ $product->image }}" >--}}
{{--                                <div class="wrap-pic-w pos-relative">--}}
{{--                                    <img id="modelpimage" src="/storage/{{ $product->image }}" alt="IMG-PRODUCT">--}}
{{--                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="/storage/{{ $product->image }}">--}}
{{--                                        <i class="fa fa-expand"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            @if($galleries!=null)--}}
{{--                            @foreach ($galleries as $key => $gallery)--}}

{{--                            <div class="item-slick3 yelloww" data-thumb="{{asset('storage')}}/{{ $gallery->image }}" >--}}
{{--                                <div class="wrap-pic-w pos-relative">--}}
{{--                                    <img id="modelpimage" src="{{asset('storage')}}/{{ $gallery->image }}" alt="IMG-PRODUCT">--}}
{{--                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('storage')}}/{{ $gallery->image }}">--}}
{{--                                        <i class="fa fa-expand"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            @endforeach--}}
{{--                                @endif--}}


                            @if($product_media!=null)
                                @foreach ($product_media as $key => $media)
                                    @if($media->title!=null)
                                    <div class="item-slick3 {{$media->title}}" data-thumb="{{asset('storage/galleries')}}/{{$media->img_name}}" >
                                        @else
                                            <div class="item-slick3 noopt" data-thumb="{{asset('storage/galleries')}}/{{$media->img_name}}" >
                                                @endif
                                        <div class="wrap-pic-w pos-relative">
                                            <img id="modelpimage" src="{{asset('storage/galleries')}}/{{$media->img_name}}" alt="IMG-PRODUCT">
                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('storage/galleries')}}/{{$media->img_name}}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                @endforeach
                            @endif


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 id="modelptitle" class="mtext-105 cl2 js-name-detail p-b-14">{{ $product->title }}</h4>
                    @if($product->sale_price != null)
                        <span class="mtext-105 cl2" style="text-decoration: line-through; color: #999999; font-size: 16px">{{ $product->price }}₺</span>
                        <span id="modelpprice" class="mtext-106 cl2">{{ $product->sale_price }}</span><span class="mtext-106 cl2">₺</span>
                    @else
                        <span id="modelpprice" class="mtext-106 cl2">{{ $product->price }}</span><span class="mtext-106 cl2">₺</span>
                    @endif

                    <p id="modelpdesc" class="stext-102 cl3 p-t-23">{{ $product->shortDesc }}</p>

                    <!--  -->
                    <div class="p-t-33">

{{--                        <?php--}}
{{--                        $optionQuery = $dbConnect->prepare("SELECT * FROM mainoption WHERE id IN (SELECT main_option FROM suboption WHERE id IN (SELECT suboption1 FROM product_option WHERE product_id = ?)) ");--}}
{{--                        $optionQuery->execute([$product["id"]]);--}}
{{--                        $optionNum = $optionQuery->rowCount();--}}
{{--                        $options = $optionQuery->fetchAll(PDO::FETCH_ASSOC);--}}
{{--                        ?>--}}
{{--                        <?php--}}

                        @if($suboption1_mainoptions!=null)
                        @foreach($suboption1_mainoptions as $key => $mainoption)

                        <div class="size-203 respon6" style="font-family: Poppins-Bold">
                            <small>{{ $mainoption->title }}</small>
                        </div>

                        <div class="flex-w p-b-10">

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select id="selectoption1" class="js-select2" name="option1">

{{--                                        <?php--}}
{{--                                        $soptionQuery = $dbConnect->prepare("SELECT * FROM suboption WHERE id IN (SELECT suboption1 FROM product_option WHERE product_id = ?)");--}}
{{--                                        $soptionQuery->execute([$product["id"]]);--}}
{{--                                        $soptionNum = $soptionQuery->rowCount();--}}
{{--                                        $soptions = $soptionQuery->fetchAll(PDO::FETCH_ASSOC);--}}

{{--                                        foreach ($soptions as $key => $soption) { ?>--}}
{{--                                        <option value="<?= $soption["title"] ?>"><?= $soption["title"] ?></option>--}}
{{--                                        <?php--}}
{{--                                        }--}}
{{--                                        ?>--}}

                                        @foreach ($suboptions1 as $key => $suboption1)
                                            <option value="{{ $suboption1->title }}">{{ $suboption1->title }}</option>
                                        @endforeach



                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                            @endif

{{--                        $option2Query = $dbConnect->prepare("SELECT * FROM mainoption WHERE id IN (SELECT main_option FROM suboption WHERE id IN (SELECT suboption2 FROM product_option WHERE product_id = ?)) ");--}}

{{--                        $option2Query->execute([$product["id"]]);--}}
{{--                        $option2Num = $option2Query->rowCount();--}}
{{--                        $option2 = $option2Query->fetch(PDO::FETCH_ASSOC);--}}


                        @if($suboption2_mainoptions != null)
                        <div class="size-203 respon6" style="font-family: Poppins-Bold">
                            <small>{{ $suboption2_mainoptions->title }}</small>
                        </div>
                        <div class="flex-w  p-b-10">

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select id="selectoption2" class="js-select2" name="option2">

{{--                                        <?php--}}
{{--                                        $s2optionQuery = $dbConnect->prepare("SELECT * FROM suboption WHERE id IN (SELECT suboption2 FROM product_option WHERE product_id = ? and suboption1 = (SELECT suboption1 FROM product_option LIMIT 1))");--}}
{{--                                        $s2optionQuery->execute([$product["id"]]);--}}
{{--                                        $s2optionNum = $s2optionQuery->rowCount();--}}
{{--                                        $s2options = $s2optionQuery->fetchAll(PDO::FETCH_ASSOC);--}}

{{--                                        foreach ($s2options as $key => $s2option) { ?>--}}
{{--                                        <option value="<?= $s2option["title"] ?>"><?= $s2option["title"] ?></option>--}}
{{--                                        <?php--}}
{{--                                        }--}}
{{--                                        ?>--}}

                                        @foreach ($suboptions2 as $key => $suboption2)
                                            <option value="{{ $suboption2->title }}">{{ $suboption2->title }}</option>
                                        @endforeach

                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                        @endif


                        <div class="flex-w p-b-10">

                            <!-- <div class="size-204 flex-w flex-m respon6-next"> -->
                            <div class="flex-w flex-m">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" id="num-product" value="1" readonly>

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>

                                <button data-id="{{ $product->id }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Sepete Ekle
                                </button>
                            </div>
                        </div>



                    </div>


{{--                    <div class="flex-w  p-t-40 ">--}}
{{--                        <div class="flex-m bor9 p-r-10 m-r-11">--}}
{{--                            <?php if ($isFav): ?>--}}
{{--                            <a href="#" data-id="<?= $product["id"] ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addedwish-detail tooltip100" data-tooltip="Favorilere Ekle">--}}
{{--                                <i class="zmdi zmdi-favorite"></i>--}}
{{--                            </a>--}}
{{--                            <?php else: ?>--}}
{{--                            <a href="#" data-id="<?= $product["id"] ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Favorilere Ekle">--}}
{{--                                <i class="zmdi zmdi-favorite"></i>--}}
{{--                            </a>--}}
{{--                            <?php endif ?>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">--}}
{{--                            <i class="fab fa-facebook-f"></i>--}}
{{--                        </a>--}}

{{--                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">--}}
{{--                            <i class="fab fa-twitter"></i>--}}
{{--                        </a>--}}

{{--                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">--}}
{{--                            <i class="fab fa-google-plus"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <?php if (isset($product["brand_id"])): ?>--}}
{{--                    <?php--}}
{{--                    $brandQuery = $dbConnect->prepare("SELECT * FROM brand WHERE id = ?");--}}
{{--                    $brandQuery->execute([$product["brand_id"]]);--}}
{{--                    $brand = $brandQuery->fetch(PDO::FETCH_ASSOC);--}}
{{--                    ?>--}}
{{--                    <p style="font-family: Poppins-Regular; margin-top: 15px;">Marka: <a href="/brands/<?= $brand["slug"] ?>" style="color: #495F85;"><?= $brand["title"] ?></a></p>--}}
{{--                    <?php endif ?>--}}





                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
												<span class="stext-102 cl3 size-205">
													Weight
												</span>

                                        <span class="stext-102 cl6 size-206">
													0.79 kg
												</span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
												<span class="stext-102 cl3 size-205">
													Dimensions
												</span>

                                        <span class="stext-102 cl6 size-206">
													110 x 33 x 100 cm
												</span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
												<span class="stext-102 cl3 size-205">
													Materials
												</span>

                                        <span class="stext-102 cl6 size-206">
													60% cotton
												</span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
												<span class="stext-102 cl3 size-205">
													Color
												</span>

                                        <span class="stext-102 cl6 size-206">
													Black, Blue, Grey, Green, Red, White
												</span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
												<span class="stext-102 cl3 size-205">
													Size
												</span>

                                        <span class="stext-102 cl6 size-206">
													XL, L, M, S
												</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="images/avatar-01.jpg" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
														<span class="mtext-107 cl2 p-r-20">
															Ariana Grande
														</span>

                                                <span class="fs-18 cl11">
															<i class="zmdi zmdi-star"></i>
															<i class="zmdi zmdi-star"></i>
															<i class="zmdi zmdi-star"></i>
															<i class="zmdi zmdi-star"></i>
															<i class="zmdi zmdi-star-half"></i>
														</span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Add review -->
                                    <form class="w-full">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Add a review
                                        </h5>

                                        <p class="stext-102 cl6">
                                            Your email address will not be published. Required fields are marked *
                                        </p>

                                        <div class="flex-w flex-m p-t-50 p-b-23">
													<span class="stext-102 cl3 m-r-16">
														Your Rating
													</span>

                                            <span class="wrap-rating fs-18 cl11 pointer">
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<input class="dis-none" type="number" name="rating">
													</span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="name">Name</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="email">Email</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
				<span class="stext-107 cl6 p-lr-25">
					SKU: JAK-01
				</span>

        <span class="stext-107 cl6 p-lr-25">
					Categories: Jacket, Men
				</span>
    </div>
</section>





<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="/images/product-01.jpg" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Esprit Ruffle Shirt
                                </a>

                                <span class="stext-105 cl3">
											$16.64
										</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="/images/product-02.jpg" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Herschel supply
                                </a>

                                <span class="stext-105 cl3">
											$35.31
										</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="/images/product-03.jpg" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Only Check Trouser
                                </a>

                                <span class="stext-105 cl3">
											$25.50
										</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="/images/product-04.jpg" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Classic Trench Coat
                                </a>

                                <span class="stext-105 cl3">
											$75.00
										</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="/images/product-05.jpg" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Front Pocket Jumper
                                </a>

                                <span class="stext-105 cl3">
											$34.75
										</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="/images/product-06.jpg" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Vintage Inspired Classic
                                </a>

                                <span class="stext-105 cl3">
											$93.20
										</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="/images/product-07.jpg" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Shirt in Stretch Cotton
                                </a>

                                <span class="stext-105 cl3">
											$52.66
										</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="/images/product-08.jpg" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Pieces Metallic Printed
                                </a>

                                <span class="stext-105 cl3">
											$18.96
										</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.partials.footer')

<!-- CONTENT END -->

<!-- CART -->
@include('layouts.partials.modalcart')
<!-- CART END -->

@include('layouts.partials.jsassets')


<script src={{asset('storage/template/vendor/select2/select2.min.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

<script>
    $(document).ready(function() {
        var selected = $("#selectoption1 :selected").text();
        if (selected !== "")
        $(".slick-slider").slick('slickFilter','.'+selected);
    });

</script>

</html>
<?php //$dbConnect = null ?>
