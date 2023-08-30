<!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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



<div class="container" style="margin-top: 7%; margin-bottom: 7%">
    <div class="row">
        <div class="col-md-4">
            <h3 class="mtext-111 cl2 p-b-16">
                Kayıt Ol
            </h3>
            <?php if (isset($_SESSION["error"])) {
                echo $_SESSION["error"];
            } ?>
            <small></small>
            <form action="javascript:void(0);" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="İsim" name="username" required="required">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Soyisim" name="usersurname" required="required">
                </div>

                <div class="mb-3 ml-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="usergender" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" style="padding: 0; margin: 0; margin-right: 15px; font-size: 12px; padding-top: 2px" for="inlineRadio1">ERKEK</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="usergender" id="inlineRadio2" value="2" required>
                        <label class="form-check-label" style="padding: 0; margin: 0; margin-right: 15px; font-size: 12px; padding-top: 2px" for="inlineRadio2">KADIN</label>
                    </div>
                </div>


                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="E-posta Adresi" name="useremail" required="required">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Şifre" name="userpassword" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="password" class="form-control" id="exampleInputPassword5" placeholder="Şifre (Tekrar)" name="userrepassword" required="required">
                        </div>
                    </div>
                </div>

                <div class="form-check mb-3  ml-4">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required="required">
                    <label class="form-check-label" style="padding: 0; margin: 0; margin-right: 15px; font-size: 12px; padding-top: 2px" for="flexCheckDefault">
                        AHLAT tarafından, Gizlilik ve Kişisel Verilerin Korunması Politikası kapsamında, iletişim bilgilerime ticari e-ileti gönderilmesine ve sağladığım kişisel verilerin bu kapsamda kullanılmasına izin veriyorum.
                    </label>
                </div>
                <div class="form-check mb-3 ml-4">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" required="required">
                    <label class="form-check-label" style="padding: 0; margin: 0; margin-right: 15px; font-size: 12px; padding-top: 2px;" for="flexCheckDefault2">
                        Sağladığım kişisel verilerin Ahlat tarafından Gizlilik ve Kişisel Verilerin Korunması Politikası'nda belirtilen amaçlar doğrultusunda işlenmesine onay verir, Üyelik Sözleşmesi'ni kabul ederim.
                    </label>
                </div>



                <button type="submit" class="btn" id="registeruser" style="background-color: #116c7f; color: #f2f1e9; border: none; width: 100%; height: 40px; font-family: 'Poppins', sans-serif; font-size: 16px; line-height: 18px; text-decoration: none">AHLAT'A KAYIT OL</button>
            </form>


            <div class="ml-1 mt-4 p-3 text-center alreadymember" style="border: 1px solid #f2f1e9; color: #85817c">
                <p>ZATEN ÜYE MİSİN? GİRİŞ YAP</p>
            </div>


        </div>

        <div class="col-md-2"><br></div>

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
@include('layouts.partials.modalproduct')
@include('layouts.partials.modalcart')
@include('layouts.partials.jsassets')

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

</html>
