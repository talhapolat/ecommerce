<?php
session_start();
ob_start();
require_once("../app/func.php");

$carttotal = session('carttotal');
$discount = 0;

if (!isset($user)) {
    unset($_SESSION['ccode']);
    unset($_SESSION['discount']);
}

//if (isset($_SESSION['ccode'])) {
//    $couponQuery = $dbConnect->prepare("SELECT * FROM coupons WHERE ccode = ?");
//    $couponQuery->execute([$_SESSION["ccode"]]);
//    $couponNum = $couponQuery->rowCount();
//    $coupon = $couponQuery->fetch(PDO::FETCH_ASSOC);
//
//    if ($couponNum == 1) {
//
//        if ($coupon['all_products'] == 1) {
//            if ($coupon['all_customers'] == 1) {
//                if ($coupon['rate_discount'] > 0) {
//                    $discount = $carttotal*$coupon['rate_discount']/100;
//                } elseif ($coupon['amount_discount'] > 0) {
//                    $discount = $coupon['amount_discount'];
//                }
//            } else {
//                $custCheckQuery = $dbConnect->prepare("SELECT * FROM coupons_customers WHERE coupon_id = ? and customer_id = ?");
//                $custCheckQuery->execute([$coupon['id'], $user['id']]);
//                $custCheckNum = $custCheckQuery->rowCount();
//                if ($custCheckNum == 1) {
//                    if ($coupon['rate_discount'] > 0) {
//                        $discount = $carttotal*$coupon['rate_discount']/100;
//                    } elseif ($coupon['amount_discount'] > 0) {
//                        $discount = $coupon['amount_discount'];
//                    }
//                } else {
//                    $error = "";
//                    $discount = 0;
//                }
//            }
//        } else {
//
//            foreach ($_SESSION['cart'] as $key => $prdct) {
//                $checkProdQuery = $dbConnect->prepare("SELECT * FROM coupons_products WHERE coupon_id = ? and product_id = ?");
//                $checkProdQuery->execute([$coupon['id'], $prdct['id']]);
//                $checkProdNum = $checkProdQuery->rowCount();
//
//                if ($checkProdNum == 1) {
//
//                    if ($coupon['all_customers'] == 1) {
//                        if ($coupon['rate_discount'] > 0) {
//                            $discount += $prdct['price']*$_SESSION["qty"][$key]['qty']*$coupon['rate_discount']/100;
//                        } elseif ($coupon['amount_discount'] > 0) {
//                            $discount += $coupon['amount_discount']*$_SESSION["qty"][$key]['qty'];
//                        }
//                    } else {
//                        $custCheckQuery = $dbConnect->prepare("SELECT * FROM coupons_customers WHERE coupon_id = ? and customer_id = ?");
//                        $custCheckQuery->execute([$coupon['id'], $user['id']]);
//                        $custCheckNum = $custCheckQuery->rowCount();
//                        if ($custCheckNum == 1) {
//                            if ($coupon['rate_discount'] > 0) {
//                                $discount += $prdct['price']*$_SESSION["qty"][$key]['qty']*$coupon['rate_discount']/100;
//                            } elseif ($coupon['amount_discount'] > 0) {
//                                $discount = $coupon['amount_discount']*$_SESSION["qty"][$key]['qty'];
//                            }
//                        } else {
//                            $error = "Bu indirim kuponu hesabınıza tanımlı değil.";
//                            $discount = 0;
//                        }
//                    }
//
//                }
//            }
//            if ($discount == 0) {
//                $error = $coupon['ccode'] . " bu ürünlerde geçerli değil.";
//            }
//
//        }
//
//        if ($carttotal < $coupon['min_basket']) {
//            $discount = 0;
//            if (!isset($error)) {
//                $error = $coupon['ccode'] ." ". $coupon['min_basket'] . "₺ ve üzeri alışverişlerde geçerlidir.";
//            }
//        }
//
//        if ($discount > $coupon['max_discount']) {
//            $discount = $coupon['max_discount'];
//        }
//        $_SESSION['discount'] = $discount;
//    } else {
//        $error = "İndirim kodu geçersiz.";
//        $discount = 0;
//    }
//}


if ($carttotal - $discount >= 200) {
    $shipping_cost = 0;
} else {
    $shipping_cost = 9;
}

?>

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
<br><br>

<!-- Shoping Cart -->
<!-- <form action="paymentcont.php" method="POST" class="bg0 p-t-75 p-b-85"> -->
<div class="container bg0 p-t-75 p-b-85">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <?php if ($carttotal == 0): ?>
                <h4 class="mtext-108 cl2 p-b-30">
                    Sepetinize ürün eklemediniz.
                </h4>
                <?php else: ?>
                <div class="wrap-table-shopping-cart">

                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Ürün</th>
                            <th class="column-2"></th>
                            <th class="column-3">Fiyat</th>
                            <th class="column-4 pr-5">Miktar</th>
                            <th class="column-5">Toplam</th>
                        </tr>


                            <?php

                        if (sizeof(session('cart')) > 0) {

                            ?>
                        <form action="updatecart" method="POST" name="updateCart" id="updateCart">
                            @csrf
                                <?php

                            foreach (session('cart') as $key => $pcart) { ?>

                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1" onclick="deletecart(<?= $key ?>)">
                                        <img src="<?= $pcart['image'] ?>" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2" style="min-width: 200px"><?= $pcart['title'] ?> <br>
                                    <small>
                                            <?php if ($pcart['option1'] != null and $pcart['option1'] != "0") {
                                            echo $pcart['option1'];
                                        }
                                            if ($pcart['option2'] != null and $pcart['option2'] != "0") {
                                                echo " | " . $pcart['option2'];
                                            }
                                            ?>
                                    </small>
                                </td>
                                <td class="column-3"><?= $pcart['price'] ?>₺</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                               name="num-product[]" id="num-product"
                                               value="<?= session('qty')[$key]['qty'] ?>">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5"><?= $pcart['price'] * session('qty')[$key]['qty'] ?>₺</td>
                            </tr>

                                <?php

                            }
                                ?>
                                <?php
                                ?>
                        </form>
                            <?php
                        }
                            ?>

                    </table>

                </div>

                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    <div class="flex-w flex-m m-tb-5">
                            <?php if (isset($_SESSION['ccode']) and $discount > 0):
                            $couponQuery = $dbConnect->prepare("SELECT * FROM coupons WHERE ccode = ?");
                            $couponQuery->execute([$_SESSION["ccode"]]);
                            $couponNum = $couponQuery->rowCount();
                            $coupon = $couponQuery->fetch(PDO::FETCH_ASSOC);
                            ?>
                        <h5 class="stext-101"><a href="/App/couponController.php?cancelCoupon=1"><i class="fas fa-times"
                                                                                                    style="color:red"></i></a> <?= $_SESSION['ccode'] ?>
                        </h5>
                        <h5 class="stext-101 ml-1"> - <?= $coupon['title'] ?></h5>


                        <?php else: ?>
                        <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-tb-5" style="width: 48%" type="text"
                               id="couponcode" name="coupon" placeholder="Kupon Kodu">
                        <div style="width: 2%"></div>

                            <?php if (isset($user)): ?>
                        <div class="flex-c-m stext-101 cl2 size-117 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5"
                             onclick="submitCouponForm()" style="width: 48%; text-align: right;float: right;">
                            Uygula
                        </div>
                        <?php else: ?>
                        <div
                            class="flex-c-m stext-101 cl2 size-117 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5 signup"
                            style="width: 48%; text-align: right;float: right;">
                            Uygula
                        </div>
                        <?php endif ?>


                        <?php endif ?>
                    </div>

                    <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                         onclick="submitDetailsForm()">
                        Sepeti Güncelle
                    </div>


                </div>
                    <?php if (isset($error)): ?>
                <small><?= $error ?></small>
                <?php endif ?>
                <?php endif ?>

            </div>
        </div>


        <div class="col-lg-10 col-xl-5 m-lr-auto m-b-50" style="min-height: 500px">
            <form action="checkoutcontrol/1" method="POST">
                @csrf
                <div class="bor10 p-lr-40 p-t-30 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Sepet Toplamı
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
									<span class="stext-110 cl2">
										Ara Toplam:
									</span>
                        </div>

                        <div class="size-209" style="text-align: right;">
									<span class="mtext-110 cl2">
										<?= $carttotal ?>₺
									</span>
                        </div>
                    </div>

                    @if($discount > 0)
                        <div class="flex-w flex-t bor12 p-b-13 p-t-13">
                            <div class="size-208">
										<span class="stext-110 cl2" style="color:red">
											İndirim:
										</span>
                            </div>

                            <div class="size-209" style="text-align: right;">
										<span class="mtext-110 cl2">
											<?= $_SESSION['discount'] ?>₺
										</span>
                            </div>
                        </div>
                    @endif


                    @if($carttotal == 0)


                    @else

                        <div class="flex-w flex-t  p-b-23 p-t-13">
                            <div class="size-208">
										<span class="stext-110 cl2">
											Gönderim:
										</span>
                            </div>

                            <div class="size-209" style="text-align: right;">
										<span class="mtext-110 cl2">
											{{$shipping_cost}}₺
										</span>
                            </div>
                        </div>

                        @if(!auth()->check())
                            <p class="stext-111 cl6 p-t-2" style="text-align:justify">
                                <a href="/login">Giriş</a> yaparak kayıtlı adreslerinizi görebilir, yeni adres
                                kaydedebilir
                                ve zaman kazanabilirsiniz.
                            </p>


                            <div class="p-b-15 p-t-15 bor12">
										<span class="stext-112 cl8">
											ADRES BİLGİLERİ
										</span>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="addressname"
                                           placeholder="Ad" required value="{{session('addressname')}}">
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="addresssurname"
                                           placeholder="Soyad" required value="{{session('addresssurname')}}">
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="addressemail"
                                           placeholder="E-posta" required value="{{session('addressemail')}}">
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="addressphone"
                                           placeholder="Telefon" required value="{{session('addressphone')}}">
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="addresscity"
                                           placeholder="Şehir" required value="{{session('addresscity')}}">
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                           name="addressdistrict"
                                           placeholder="İlçe" required value="{{session('addressdistrict')}}">
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address"
                                           placeholder="Adresiniz" required value="{{session('address')}}">
                                </div>


                                <!--
                                <div class="flex-w">
                                    <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Update Totals
                                    </div>
                                </div> -->
                            </div>

                        @else

                            @if(count($userAddress) > 0 and request()->input('newadd') != true)
                                <span class="stext-110 cl2">
										Hangi adresinize gönderelim?
									</span>
                                <a href="/basket?newadd=true" style="color: black; margin-left: 5px; float: right;"><i
                                        class="fas fa-plus"></i> Yeni Adres</a>


                                {{--                    if (isset($_GET["uaddress"])) {--}}
                                {{--                    $addressQ = $dbConnect->prepare("SELECT * FROM address WHERE user = ? and id = ?");--}}
                                {{--                    $addressQ->execute([$id, $_GET["uaddress"]]);--}}
                                {{--                    $addressN = $addressQ->rowCount();--}}
                                {{--                    $ads = $addressQ->fetch(PDO::FETCH_ASSOC);--}}
                                {{--                    if ($addressN == 0) {--}}
                                {{--                        header("Location:/");--}}
                                {{--                    }--}}
                                {{--                    ?>--}}

                                {{--                    <div class="card mt-1" style="cursor: pointer;">--}}
                                {{--                        <div class="card-body" style="padding: 5px!important">--}}
                                {{--                            <h6 class="mtext-111 cl2 p-b-8" style="font-size: 14px"><?= $ads["title"] ?> </h6>--}}
                                {{--                            <h6 class="card-text" style="font-size: 14px"><?= $ads["name"] ?> <?= $ads["surname"] ?> - <?= $ads["phone"] ?></h6>--}}
                                {{--                            <p class="card-text" style="font-size: 14px"><?= $ads["address"] ?> <?= $ads["state"] ?> <?= $ads["city"] ?></p>--}}
                                {{--                        </div>--}}
                                {{--                    </div>--}}
                                {{--                    <input type="hidden" name="uaddress" value="<?= $_GET["uaddress"] ?> ">--}}
                                {{--                    <a href="/basket" style="color: black; margin-top: 15px"><i class="fas fa-exchange-alt"></i> Değiştir </a>--}}



                                @foreach ($userAddress as $key => $address)
                                    <a href="?uaddress={{$address->id}}"
                                       style="text-decoration: none!important; color: black">
                                        <div class="card mt-1" style="cursor: pointer;">
                                            <div class="card-body" style="padding: 5px!important">
                                                <h6 class="mtext-111 cl2 p-b-8"
                                                    style="font-size: 14px">{{$address->title}} </h6>
                                                <h6 class="card-text"
                                                    style="font-size: 14px">{{$address->name}} {{$address->surname}}
                                                    - {{$address->phone}}</h6>
                                                <p class="card-text"
                                                   style="font-size: 14px">{{$address->address}} {{$address->state}}
                                                    , {{$address->city}}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            @else

                                @if(request()->input('newadd') == true)
                                    <a href="/basket" style="color: black; margin-left: 5px;"><i
                                            class="fas fa-arrow-left"></i> Geri</a>
                                @endif

                                <div class="p-b-15 p-t-15 bor12">
										<span class="stext-112 cl8">
											ADRES BİLGİLERİ
										</span>

                                    <form id="newaddressform" action="{{route('useraddressesnew')}}" method="POST">
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="name" id="name" placeholder="Adres Başlığı">
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="addressname" id="addressname" placeholder="Ad" required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="addresssurname" id="addresssurname" placeholder="Soyad"
                                                   required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="addressphone" id="addressphone" placeholder="Telefon" required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email"
                                                   name="addressemail" id="addressemail" placeholder="E-posta Adresi"
                                                   required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="addresscity" id="addresscity" placeholder="Şehir" required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="addressdistrict" id="addressdistrict" placeholder="İlçe"
                                                   required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="address" id="address" placeholder="Adresiniz" required>
                                        </div>

                                        <div class="flex-w">
                                            <div id="newaddress"
                                                 class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                                Adresi Kaydett
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            @endif

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
									<span class="mtext-101 cl2">
										Toplam:
									</span>
                                </div>

                                <div class="size-209 p-t-1" style="text-align: right;">
									<span class="mtext-110 cl2">
										{{$carttotal + $shipping_cost - $discount}}₺
									</span>
                                </div>
                            </div>

                            @if(request()->input('newadd') != true)
                                <button type="submit"
                                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mb-4">
                                    Ödemeye Geç
                                </button>
                            @else
                                <button type="button"
                                        class="btn flex-c-m stext-101 cl0 size-116 bg3 bor14  p-lr-15 trans-04 pointer mb-4"
                                        disabled>
                                    Ödemeye Geç
                                </button>
                            @endif

                        @endif
                    @endif

                </div>
            </form>
        </div>


    </div>
</div>
<!-- </form> -->

<br><br>

<script language="javascript" type="text/javascript">
    function submitDetailsForm() {
        $("#updateCart").submit();
    }

    function submitCouponForm() {
        ccode = document.getElementById("couponcode").value;
        window.location.replace("/App/couponController.php?ccode=" + ccode);
    }


</script>


@include('layouts.partials.footer')
@include('layouts.partials.modalproduct')
<!-- CONTENT END -->

<!-- CART -->
@include('layouts.partials.modalcart')
<!-- CART END -->

@include('layouts.partials.jsassets')


</body>

</html>

