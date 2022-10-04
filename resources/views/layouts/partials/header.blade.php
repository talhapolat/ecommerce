
<!-- Header -->
<header class="header">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    200₺ ve üzeri alışverişlerde ücretsiz kargo!
                </div>

                <div class="right-top-bar flex-w h-full">
                    <?php
                    if (isset($_SESSION["useremail"])) {
                    ?>
                    <a href="/account" class="flex-c-m trans-04 p-lr-25">
                        HESABIM
                    </a>
                    <?php
                    } else {
                    ?>
                    <a href="/login" class="flex-c-m trans-04 p-lr-25">
                        GİRİŞ
                    </a>

                    <a href="/register" class="flex-c-m trans-04 p-lr-25">
                        KAYIT OL
                    </a>
                <?php } ?>

                <!-- <a href="#" class="flex-c-m trans-04 p-lr-25">
						EN
					</a>

					<a href="#" class="flex-c-m trans-04 p-lr-25">
						USD
					</a> -->
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="{{asset('storage/template/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">

                        <!-- <li>
                                                    <a href="/">Anasayfam</a>

                                                </li>
                                                <li>
                                                    <a href="/products">Koleksiyon</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="/products">Tüm Ürünler</a></li>
                                                        <li><a href="/collections/erkek-kis-koleksiyonu">Erkek Kış Koleksiyonu</a></li>
                                                        <li><a href="/collections/unisex-vintage-koleksiyonu">Unisex Vintage Koleksiyonu</a></li>
                                                        <li>
                                                            <a style="margin:0px;padding: 0px;width: auto;height: auto; color: #deded2;">
                                                                <div onclick="window.location='/collections/erkek-kis-koleksiyonu';" style="cursor: pointer;background: #474745 url(https://www.kaft.com/static/images/menu/menu-newitem-bg-5.jpg) no-repeat; height: 100px; color:white; display:flex; justify-content:center;align-items: center;">
                                                                    <div style="font-family: Poppins-Regular;">ERKEK KIŞ KOLEKSİYONU</a></div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="label1" data-label1="hot">
                                                    <a href="/products?type=new">Yeni Sezon</a>
                                                </li>

                                                <li>
                                                    <a href="/about">Hakkımızda</a>
                                                </li>

                                                <li>
                                                    <a href="/contact">İletişim</a>
                                                </li> -->

                        @foreach($navigations as $nav)
                            <li>
                                <a href="{{$nav->slug}}">{{$nav->title}}</a>
                                @php
                                    $subnavigations = App\Http\Controllers\CategoryController::haveSubNav($nav->id);
                                @endphp
                                @if($subnavigations != null)

                                    <ul class="sub-menu">
                                        @foreach($subnavigations as $subnav)
                                            <li><a href="{{$subnav->slug}}">{{$subnav->title}}</a></li>
                                        @endforeach
                                    </ul>

                                @endif
                            </li>
                        @endforeach


                    </ul>
                </div>

                <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div id="cartnoti" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="
                        @php if (session('qty')!=null) { echo array_sum(array_column(session('qty'), 'qty')); } else echo 0  @endphp
                            ">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>

<!--                        --><?php
//                        if (isset($user['id'])) {
//                            $productQuery = $dbConnect->prepare("SELECT * FROM products WHERE statu = '1' and id IN (SELECT product_id FROM favorites WHERE user_id = ?)");
//                            $productQuery->execute([$id]);
//                            $productNum = $productQuery->rowCount();
//                            $products = $productQuery->fetchAll(PDO::FETCH_ASSOC);
//                        } else {
//                            $productNum = 0;
//                        }
//
//                        ?>

                        <a href="/favorites" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="99">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                    </div>


            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/index"><img src="/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div id="cartnotimobil"
                 class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                 data-notify="50">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
               data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
	<span class="hamburger-box">
		<span class="hamburger-inner"></span>
	</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    100₺ ve üzeri alışverişlerde ücretsiz kargo!
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Hesabım
                    </a>

                    <!-- <a href="#" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a> -->
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">

            <li>
                <a href="#">Koleksiyon</a>
                <ul class="sub-menu-m" style="display: none;">
                    <li><a href="/products">Tüm Ürünler </a></li>
                    <li><a href="isci-yelekleri.html">Erkek Kış Koleksiyonu</a></li>
                    <li><a href="isci-yelekleri.html">Vintage Unisex Koleksiyon</a></li>
                </ul>
                <span class="arrow-main-menu-m">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</span>
            </li>

            <li>
                <a href="/products?type=new">Yeni Sezon</a>
            </li>

            <li>
                <a href="/about">Hakkımızda</a>
            </li>

            <li>
                <a href="/contact">İletişim</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{asset('storage/template/images/icons/icon-close2.png')}}" alt="CLOSE">
            </button>

            <form action="/#collection" class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search-product" placeholder="Ara...">
            </form>
        </div>
    </div>
</header>
