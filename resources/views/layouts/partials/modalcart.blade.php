<?php
$baskettotal = 0;
foreach ($_SESSION["qty"] as $key => $qty) {
    $baskettotal += $qty['qty']*$_SESSION['cart'][$key]['price'];
}
?>

<!-- CART -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">
				Sepetin
			</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll w-full">
            <ul id="cartlist" class="header-cart-wrapitem w-full">

                <?php

                if (sizeof($_SESSION["cart"]) > 0) {

                foreach ($_SESSION["cart"] as $key => $pcart) { ?>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img" onclick="deletecart(<?= $key ?>)">
                        <img src="<?= $pcart['image'] ?>" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            <?= $pcart['title'] ?>
                        </a>

                        <span class="header-cart-item-info">
									<span id="cartproductqty"><?= $_SESSION["qty"][$key]['qty'] ?></span> x <?= $pcart['price'] ?>₺
									<small style="float: right;">
										<?php if ($pcart['option1'] != null and $pcart['option1'] != "0") {
                                            echo $pcart['option1'];
                                        }
                                        if ($pcart['option2'] != null and $pcart['option2'] != "0") {
                                            echo " | " . $pcart['option2'];
                                        }
                                        ?>
									</small>
								</span>
                    </div>
                </li>

                <?php
                }
                }
                ?>
            </ul>

            <?php
            if (isset($_SESSION["carttotal"])) { ?>
            <div class="w-full">
                <div id="header-cart-totall" class="header-cart-total w-full p-tb-40">
                    Toplam:
                    <?php if (isset($baskettotal)) {
                        echo $baskettotal;
                    } else {
                    ?>
                    0
                    <?php
                    }  ?>₺
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="/basket" class="flex-c-m stext-101 cl0 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10" style="width: 100%; height: 45px;" >
                        Sepete Git
                    </a>

                    <!-- <a href="/payment" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Ödeme
                    </a> -->
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- CART END -->
