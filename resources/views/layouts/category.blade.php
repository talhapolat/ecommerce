<?php
session_start();
ob_start();
require_once 'C:\Users\talha\PhpstormProjects\larasoft\app\func.php';
?>


    <!DOCTYPE html>
<html>

<head>
    <title>AHLAT E-Ticaret Sitesi Yazılımı | KOLEKSİYON</title>
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

<!-- Product -->
<div class="bg0 m-t-23 p-b-140" style="margin-top: 6%">
    <div class="container">

        <div class="flex-w flex-sb-m ">

            <div class="flex-w flex-l-m ">

                <?php



//                $categoryQuery = $dbConnect->prepare("SELECT * FROM category WHERE main_category_id is NULL and statu = 1");
//                $categoryQuery->execute();
//                $categoryNum = $categoryQuery->rowCount();
//                $categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

//                if (isset($_GET["category"])) {
//                    foreach ($categories as $key => $category) {
//                        if ($_GET["category"] == $category["slug"]) {
//                            $dispcategory = $category["id"];
//                            $i = "ok";
//                        }
//                    }
//                    if (!isset($i)) {
//                        $dispcategory = $categories[0]["id"];
//                    }
//                } else {
//                    $dispcategory = $categories[0]["id"];
//                }

                $dispcategory = null;

                foreach ($parentcategories as $key=>$parentcategory) { ?>
                <button data-filter=".<?= $parentcategory["id"] ?>">
                    <a href="/category/{{ $parentcategory["slug"] }}" class="@if($parentcategory["id"] == $category['id']) mtext-112 @endif" style="font-size: 30px;  margin-right: 8px; color: black">
                        {{ $parentcategory["name"] }}
                    </a>
                </button>
                <?php } ?>

            </div>

        </div>

        <div class="flex-w flex-sb-m p-b-52">

            <div class="flex-w flex-l-m filter-tope-group m-tb-10" >
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tüm Ürünler
                </button>

                <?php

//                $categoryQuery = $dbConnect->prepare("SELECT * FROM category WHERE main_category_id = ? and statu = 1");
//                $categoryQuery->execute([$dispcategory]);
//                $categoryNum = $categoryQuery->rowCount();
//                $categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

                $subcategories = \App\Http\Controllers\CategoryController::subCategories($category['id']);

                foreach ($subcategories as $subcategory) { ?>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?= $subcategory["id"] ?>">
                    <?= $subcategory["name"] ?>
                </button>
                <?php } ?>
            </div>





            <div class="flex-w flex-c-m m-tb-10">
                <!-- <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div> -->

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-17 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-19 trans-04 zmdi zmdi-close dis-none"></i>
                    Ara
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <form action="<?= $_SERVER['REQUEST_URI'] ?>?">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-23 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Ara">
                    </div>
                    <input type="hidden" name="category" value="{{ $category['id'] }}">

                </form>
            </div>



            <!-- Filter -->
            <!-- <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Default
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Popularity
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Average rating
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Newness
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $0.00 - $50.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $50.00 - $100.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $100.00 - $150.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $150.00 - $200.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $200.00+
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Color
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Black
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Blue
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Grey
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Green
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Red
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                    <i class="zmdi zmdi-circle-o"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    White
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Tags
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Fashion
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Lifestyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Denim
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Streetstyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Crafts
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>



        <div class="row isotope-grid">


{{--            if (isset($_GET["search-product"])) {--}}
{{--                $productQuery = $dbConnect->prepare("SELECT * FROM products WHERE statu = '1' and title LIKE '%". $_GET["search-product"] ."%' and id IN (SELECT product_id FROM product_category WHERE category_id IN(SELECT id FROM category WHERE id = ? OR main_category_id = ?))");--}}
{{--            } else {--}}
{{--                $productQuery = $dbConnect->prepare("SELECT * FROM products WHERE statu = '1' and id IN (SELECT product_id FROM product_category WHERE category_id IN(SELECT id FROM category WHERE id = ? OR main_category_id = ?))");--}}
{{--            }--}}

{{--            $productQuery->execute([$dispcategory, $dispcategory]);--}}
{{--            $productNum = $productQuery->rowCount();--}}
{{--            $products = $productQuery->fetchAll(PDO::FETCH_ASSOC);--}}

            @if($productsnum > 0)

            @foreach($products as $key=>$product)

{{--            $pcategoryQuery = $dbConnect->prepare("SELECT * FROM product_category WHERE product_id = ?");--}}
{{--            $pcategoryQuery->execute([$product["id"]]);--}}
{{--            $pcategories = $pcategoryQuery->fetchAll(PDO::FETCH_ASSOC);--}}


            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item
{{--						<?php foreach ($pcategories as $pcategory): ?>--}}
{{--							<?= $pcategory["category_id"] ?>--}}
{{--						<?php endforeach ?>--}}

                @php
                   $productCategories = \App\Http\Controllers\CategoryController::getProductCategories($product['id']);
                    foreach ($productCategories as $productCategory){
                        echo $productCategory->category_id." ";
                    }
                @endphp

                ">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('storage')}}/{{$product->image}}" alt="IMG-PRODUCT">

                        <a href="#" data-id="{{$product["id"]}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" >
                            Hızlı Bakış
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l">
                            <a href="/product/{{$product["slug"]}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{$product["title"]}}
                            </a>

                            <span class="stext-105 cl3">
										{{$product["price"]}}₺
									</span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">


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









                        </div>
                    </div>
                </div>
            </div>

            @endforeach
                            @endif







        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <!-- <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Daha Fazla
            </a> -->
        </div>
    </div>
</div>

@include('layouts.partials.footer')
@include('layouts.partials.modalproduct')
<!-- CONTENT END -->

@include('layouts.partials.modalcart')

@include('layouts.partials.jsassets')

</body>

</html>
<?php //$dbConnect = null ?>
