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

if ($carttotal <= $delivery->delivery_limit_1)
    $shipping_cost = $delivery->delivery_price_1;
elseif ($carttotal > $delivery->delivery_limit_1 && $carttotal <= $delivery->delivery_limit_2)
    $shipping_cost =  $delivery->delivery_price_2;
elseif ($carttotal > $delivery->delivery_limit_2)
    $shipping_cost = 0;

?>

    <!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body class="animsition">

<!-- BACK TO TOP -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>
<!-- END -->


<div class="container" style="margin-top: 2%">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <a href="/" class="logo">
                    <img src="{{asset('storage/template/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>
            </div>

        </div>

        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">

        </div>
    </div>

</div>
<!-- CONTENT -->
<br><br>

<!-- Shoping Cart -->
<!-- <form action="paymentcont.php" method="POST" class="bg0 p-t-75 p-b-85"> -->
<div class="container bg0 p-b-85">

    <div class="row">

        <div class=" col-lg-10 col-xl-6 m-lr-auto m-b-50" style="min-height: 400px">
            <form action="checkoutcontrol/{{$step}}" method="POST">
                @csrf
                @if($step == 1)
                    <div class="bor10 p-lr-40 p-t-30 m-l-25 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Adres
                        </h4>


                            <?php if ($carttotal == 0): ?>


                        <?php else: ?>


                            <?php if (!isset($_SESSION["useremail"])) { ?>
                        <p class="stext-111 cl6 p-t-2" style="text-align:justify">
                            <a href="/login">Giriş</a> yaparak kayıtlı adreslerinizi görebilir, yeni adres kaydedebilir
                            ve
                            zaman kazanabilirsiniz.
                        </p>


                        <div class="p-b-15 p-t-15">
										<span class="stext-112 cl8">
											İLETİŞİM BİLGİLERİ
										</span>

                            <div class="row">
                                <div class="col-6">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                               name="addressname" value="{{session('addressname')}}" placeholder="Ad"
                                               required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                               name="addresssurname" value="{{session('addresssurname')}}"
                                               placeholder="Soyad" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email"
                                               name="addressemail" value="{{session('addressemail')}}"
                                               placeholder="E-posta" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                               name="addressphone" value="{{session('addressphone')}}"
                                               placeholder="Telefon" required>
                                    </div>
                                </div>
                            </div>

                            <span class="stext-112 cl8">
											TESLİMAT ADRESİ
										</span>

                            <div class="row">
                                <div class="col-6">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                               name="addresscity" value="{{session('addresscity')}}"
                                               placeholder="Şehir" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                               name="addressdistrict" value="{{session('addressdistrict')}}"
                                               placeholder="İlçe" required>
                                    </div>
                                </div>
                            </div>


                            <div class="bor8 bg0 m-b-12">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address"
                                       value="{{session('address')}}"
                                       placeholder="Adresiniz" required>
                            </div>


                            <!--
                            <div class="flex-w">
                                <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                    Update Totals
                                </div>
                            </div> -->
                        </div>

                            <?php
                        } else {

                            $addressQuery = $dbConnect->prepare("SELECT * FROM address WHERE user = ?");
                            $addressQuery->execute([$id]);
                            $addressNum = $addressQuery->rowCount();
                            $addresses = $addressQuery->fetchAll(PDO::FETCH_ASSOC);

                        if ($addressNum > 0) { ?>
                        <span class="stext-110 cl2">
										Hangi adresinize gönderelim?
									</span>
                        <a href="/newAddress?back=basket" style="color: black; margin-left: 5px; float: right;"><i
                                class="fas fa-plus"></i> Yeni Adres</a>

                            <?php

                        if (isset($_GET["uaddress"])) {
                            $addressQ = $dbConnect->prepare("SELECT * FROM address WHERE user = ? and id = ?");
                            $addressQ->execute([$id, $_GET["uaddress"]]);
                            $addressN = $addressQ->rowCount();
                            $ads = $addressQ->fetch(PDO::FETCH_ASSOC);
                            if ($addressN == 0) {
                                header("Location:/");
                            }
                            ?>

                        <div class="card mt-1" style="cursor: pointer;">
                            <div class="card-body" style="padding: 5px!important">
                                <h6 class="mtext-111 cl2 p-b-8" style="font-size: 14px"><?= $ads["title"] ?> </h6>
                                <h6 class="card-text" style="font-size: 14px"><?= $ads["name"] ?> <?= $ads["surname"] ?>
                                    - <?= $ads["phone"] ?></h6>
                                <p class="card-text"
                                   style="font-size: 14px"><?= $ads["address"] ?> <?= $ads["state"] ?> <?= $ads["city"] ?></p>
                            </div>
                        </div>
                        <input type="hidden" name="uaddress" value="<?= $_GET["uaddress"] ?> ">
                        <a href="/basket" style="color: black; margin-top: 15px"><i class="fas fa-exchange-alt"></i>
                            Değiştir </a>

                            <?php
                        }else{
                        foreach ($addresses as $key => $address) { ?>
                        <a href="?uaddress=<?= $address["id"] ?>" style="text-decoration: none!important; color: black">
                            <div class="card mt-1" style="cursor: pointer;">
                                <div class="card-body" style="padding: 5px!important">
                                    <h6 class="mtext-111 cl2 p-b-8"
                                        style="font-size: 14px"><?= $address["title"] ?> </h6>
                                    <h6 class="card-text"
                                        style="font-size: 14px"><?= $address["name"] ?> <?= $address["surname"] ?>
                                        - <?= $address["phone"] ?></h6>
                                    <p class="card-text"
                                       style="font-size: 14px"><?= $address["address"] ?> <?= $address["state"] ?> <?= $address["city"] ?></p>

                                </div>
                            </div>
                        </a>

                            <?php
                        }
                        }

                            ?>

                            <?php
                        } else { ?>

                        <div class="p-b-15 p-t-15">
										<span class="stext-112 cl8">
											ADRES BİLGİLERİ
										</span>

                            <form id="newaddressform" action="newaddresscont.php" method="POST">
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" id="name"
                                           placeholder="Adres Başlığı">
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="username"
                                           id="username" placeholder="Ad" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="usersurname"
                                           id="usersurname" placeholder="Soyad" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="userphone"
                                           id="userphone" placeholder="Telefon" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="city" id="city"
                                           placeholder="Şehir" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state"
                                           id="state"
                                           placeholder="İlçe" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address"
                                           id="address" placeholder="Adresiniz" required>
                                </div>

                                <div class="flex-w">
                                    <div id="newaddress"
                                         class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Adresi Kaydet
                                    </div>
                                </div>
                            </form>

                        </div>

                            <?php
                        }

                        } ?>


                            <?php if (isset($_GET["uaddress"]) || !isset($_SESSION["useremail"])) { ?>
                        <button type="submit"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mb-4">
                            Kargo Adımına Geç
                        </button>
                            <?php
                        } else { ?>
                        <button type="button"
                                class="btn flex-c-m stext-101 cl0 size-116 bg3 bor14  p-lr-15 trans-04 pointer mb-4"
                                disabled>
                            Ödemeye Geç
                        </button>
                            <?php
                        } ?>

                        <?php endif ?>

                    </div>
                @endif

                @if($step == 2 || $step == 3)
                    <div class="bor10 p-lr-40 p-t-30 p-b-30 m-l-25 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <div class="row">
                            <div class="col-3">
                                <h4 class="mtext-109 cl2 p-b-30" style="line-height: 1!important;">
                                    Adres
                                </h4>
                            </div>
                            <div class="col-7">
                                <h6>{{session('addressname')}} {{session('addresssurname')}}</h6>
                                <h6>{{session('addressemail')}} </h6>
                                <h6>{{session('addressphone')}} </h6>
                                <h6>{{session('address')}}, {{session('addressdistrict')}}
                                    , {{session('addresscity')}}</h6>
                            </div>
                            <div class="col-2">
                                <span><a href="/checkout?step=1" style="color: black">Düzenle</a></span>
                            </div>
                        </div>

                    </div>
                @endif

                @if($step == 2)
                    <div class="bor10 p-lr-40 p-t-30 m-t-10 m-l-25 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-15">
                            Kargo
                        </h4>
                        <div class="p-b-15">
										<span class="stext-112 cl8">
											TESLİMAT YÖNTEMİNİ SEÇİNİZ
										</span>
                            <div class="row">
                                <div class="col-6 p-t-15">

                                    @foreach($deliveries as $delivery)
                                        @php
                                        $total_price = $carttotal + $shipping_cost - $discount;

                                        if ($total_price <= $delivery->delivery_limit_1)
                                            $ship_price = $delivery->delivery_price_1;
                                        elseif ($total_price > $delivery->delivery_limit_1 && $total_price <= $delivery->delivery_limit_2)
                                        $ship_price =  $delivery->delivery_price_2;
                                        elseif ($total_price > $delivery->delivery_limit_2)
                                        $ship_price = 0;
                                        @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shiptype" value="{{$delivery->id}}" id="shiptype{{$delivery->id}}" @if(session('shiptype') == $delivery->id) checked @endif>
                                            <label class="form-check-label" for="shiptype{{$delivery->id}}">
                                                {{$delivery->delivery_title}} ({{$ship_price}}₺)
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mb-4">
                            Ödeme Adımına Geç
                        </button>
                    </div>
                @endif

                @if($step == 1 || $step == 3)
                    <div class="bor10 p-lr-40 p-t-30 m-t-10 m-l-25 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <div class="row">
                            <div class="col-3">
                                <h4 class="mtext-109 cl2 p-b-30" style="line-height: 1!important;">
                                    Kargo
                                </h4>
                            </div>
                            <div class="col-7">
                                <h6>{{$delivery->delivery_title}} ({{$shipping_cost}}₺)</h6>
                                                            </div>
                            <div class="col-2">
                                <span><a href="/checkout?step=2" style="color: black">Düzenle</a></span>
                            </div>
                        </div>
                    </div>
                @endif

                @if($step == 3)
                    <div class="bor10 p-lr-40 p-t-30 m-t-10 m-l-25 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-15">
                            Ödeme
                        </h4>
                        <div class="p-b-15">
										<span class="stext-112 cl8">
											ÖDEME YÖNTEMİNİ SEÇİNİZ
										</span>
                            <div class="row">
                                <div class="col-6 p-t-15">



                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mb-4">
                            Siparişi Tamamla
                        </button>
                    </div>
                @endif

                @if($step == 1 || $step == 2)
                    <div class="bor10 p-lr-40 p-t-30 m-t-10 m-l-25 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <div class="row">
                            <div class="col-3">
                                <h4 class="mtext-109 cl2 p-b-30" style="line-height: 1!important;">
                                    Ödeme
                                </h4>
                            </div>
                            <div class="col-7">

                            </div>
                            <div class="col-2">
                                <span><a href="/checkout?step=3" style="color: black">Düzenle</a></span>
                            </div>
                        </div>
                    </div>
                @endif
            </form>


        </div>


        <div class="col-lg-10 col-xl-6 m-lr-auto m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <?php if ($carttotal == 0): ?>
                <h4 class="mtext-108 cl2 p-b-30">
                    Sepetinize ürün eklemediniz.
                </h4>
                <?php else: ?>
                <div class="wrap-table-shopping-cart">



                    <table class="table-shopping-cart" style="min-width: 400px!important">
                        <tr class="table_head">
                            <th class="column-1">Ürün</th>
                            <th class="column-2"></th>
                            {{--                            <th class="column-3">Fiyat</th>--}}
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
                                    <div class="how-itemcart22">
                                        <img src="<?= $pcart['image'] ?>" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2" style=""><?= $pcart['title'] ?> <br>
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
                                {{--                                <td class="column-3"><?= $pcart['price'] ?>₺</td>--}}
                                <td class="text-center"><?= session('qty')[$key]['qty'] ?></td>
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

                <div class="bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">

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

                    <div class="flex-w flex-t bor12 p-b-13 p-t-13">
                        <div class="size-208">
										<span class="stext-110 cl2">
											Gönderim:
										</span>
                        </div>

                        <div class="size-209" style="text-align: right;">
										<span class="mtext-110 cl2">
											<?= $shipping_cost ?>₺
										</span>
                        </div>
                    </div>

                    <div class="flex-w flex-t  p-b-13 p-t-43">
                        <div class="size-208">
										<span class="stext-110 cl2" style="font-weight: bold">
											Toplam:
										</span>
                        </div>

                        <div class="size-209" style="text-align: right;">
										<span class="mtext-110 cl2">
											<?= $carttotal + $shipping_cost - $discount ?>₺
										</span>
                        </div>
                    </div>


                </div>
                    <?php if (isset($error)): ?>
                <small><?= $error ?></small>
                <?php endif ?>
                <?php endif ?>

            </div>


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


@include('layouts.partials.modalproduct')
<!-- CONTENT END -->

<!-- CART -->
@include('layouts.partials.modalcart')
<!-- CART END -->

@include('layouts.partials.jsassets')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>
<?php
//$dbConnect = null;
?>
