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
        <div class="col-md-4">
            <h3 class="mtext-111 cl2 p-b-16">
                Giriş Yap
            </h3>

            <form action="logincont.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">E-posta</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-posta adresinizi giriniz" aria-describedby="emailHelp" name="useremail" required="required">
                    <!--     <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Şifre <a style="float: right; font-size: 12px; padding-top: 5px">Şifremi Unuttum</a></label>

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Şifrenizi giriniz" name="userpassword" required="required">
                </div>
                <div class="mb-3 form-check">
                    <div class="row ml-1">
                        <div class="col-5">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" style="padding-left:0px" for="exampleCheck1">Beni hatırla</label>
                        </div>
                        <div class="col-7" style="text-align: right">

                        </div>
                    </div>

                </div>

                <input type="hidden" name="referer" value="<?php
                if(isset($_SERVER['HTTP_REFERER'])){
                    echo htmlspecialchars($_SERVER['HTTP_REFERER']);
                }else {echo "/";} ?>
                    ">

                <button type="submit" class="btn" style="background-color: #116c7f; color: #f2f1e9; border: none; width: 100%; height: 40px; font-family: 'Poppins', sans-serif; font-size: 16px; line-height: 18px; text-decoration: none">GİRİŞ YAP</button>
                <?php if (isset($_SESSION["error"])) { ?>
                <small style="color: red"> <?php echo $_SESSION["error"] ?> </small>
                <?php } ?>
            </form>
        </div>

        <div class="col-md-2"></div>

        <div class="col-md-6">
            <div class="how-bor1 ">
                <div class="hov-img0">
                    <img src="storage/template/images/about-01.jpg" alt="IMG">
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
