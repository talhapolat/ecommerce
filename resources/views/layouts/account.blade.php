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
                <div class="card-header" style="background-color: #116c7f; color: #f2f1e9; background-image: url('/images/icons/logo-01.png'); background-repeat: repeat; ">
                    <h5> <b>HESABIM</b> </h5>
                </div>
                @include('layouts.partials.accountsidebar')
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
                <!-- ----------------- START ------------------ -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mtext-111 cl2 p-b-8" style="font-size: 15px">
                                            Profil Bilgilerini Güncelle
                                        </h5>
                                        <form action="userupdate.php" method="POST">
                                            <label for="inputPassword5" class="form-label"> </label>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Ad" value="{{$user->name}}" required>
                                            <label for="inputPassword5" class="form-label"> </label>
                                            <input type="text" id="surname" name="usersurname" class="form-control" placeholder="Soyad" value="{{$user->surname}}" required>

                                            <div class="mb-3 ml-4 mt-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="genderRadio1" value="1" @if($user->gender == 1) checked @endif>
                                                    <label class="form-check-label" style="padding: 0; margin: 0; margin-right: 15px; font-size: 12px; padding-top: 2px" for="genderRadio1">ERKEK</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="genderRadio2" value="2" @if($user->gender == 2) checked @endif >
                                                    <label class="form-check-label" style="padding: 0; margin: 0; margin-right: 15px; font-size: 12px; padding-top: 2px" for="genderRadio2">KADIN</label>
                                                </div>
                                            </div>
                                            <label for="inputPassword5" class="form-label"> </label>
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon" value="{{$user->phone}}" required>

                                            <label for="inputPassword5" class="form-label"> </label>
                                            <input type="text" name="city" id="city" class="form-control" placeholder="İl" value="{{$user->city}}" required>

                                            <div class="mt-2 row" style="margin-left: 0px">
                                                <input type="text" name="bday" id="bday" class="form-control" style="width: 100px; margin-right: 10px" placeholder="Gün" value="{{$user->bday}}" required>
                                                <input type="text" name="bday" id="bmonth" class="form-control" style="width: 100px; margin-right: 10px" placeholder="Gün" value="{{$user->bmonth}}" required>
                                                <input type="text" name="bday" id="byear" class="form-control" style="width: 100px; margin-right: 10px" placeholder="Gün" value="{{$user->byear}}" required>
                                            </div>
                                            <div class="form-check mb-3 ml-4 mt-2">
                                                <input class="form-check-input" type="checkbox" value="1" id="privacy" name="privacy">
                                                <label class="form-check-label" style="padding: 0; margin: 0; margin-right: 15px; font-size: 12px; padding-top: 2px" for="privacy">
                                                    AHLAT tarafından, Gizlilik ve Kişisel Verilerin Korunması Politikası kapsamında, iletişim bilgilerime ticari e-ileti gönderilmesine ve sağladığım kişisel verilerin bu kapsamda kullanılmasına izin veriyorum.
                                                </label>
                                            </div>

                                            <button type="submit" class="btn" style="background-color: #116c7f; color: #f2f1e9; border: none; width: 100%; height: 40px">
                                                <h5 class="mtext-111" style="font-size: 15px; color: #f2f1e9">
                                                    GÜNCELLE
                                                </h5>
                                            </button>

                                        </form>

                                    </div>

                                    <!-- ---------------- END ---------------- -->


                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <h5 class="mtext-111 cl2 p-b-8" style="font-size: 15px">
                                                    Şifreni Değiştir
                                                </h5>
                                                <form action="passwordupdate.php" method="POST">
                                                    <label for="inputPasswordFirst" class="form-label"> </label>
                                                    <input type="password" id="inputPasswordFirst" name="userpassword" class="form-control" placeholder="Mevcut Şifre" required>
                                                    <label for="inputPasswordSecond" class="form-label"> </label>
                                                    <input type="password" id="inputPasswordSecond" name="newpassword" class="form-control" placeholder="Yeni Şifre" required>
                                                    <label for="inputPasswordRe" class="form-label"> </label>
                                                    <input type="password" id="inputPasswordRe" class="form-control" name="repassword" placeholder="Yeni Şifre (Tekrar)" required> <br>
                                                    <button type="submit" class="btn" style="background-color: #116c7f; color: #f2f1e9; border: none; width: 100%; height: 40px">
                                                        <h5 class="mtext-111" style="font-size: 15px; color: #f2f1e9">
                                                            ŞİFRENİ DEĞİŞTİR
                                                        </h5>
                                                    </button>
                                                    <?php if (isset($_SESSION["errorPass"])) {
                                                        echo $_SESSION["errorPass"];
                                                    } ?>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <h5 class="mtext-111 cl2 p-b-8" style="font-size: 15px">
                                                    E-posta Adresini Değiştir
                                                </h5>
                                                <form action="/emailupdate.php" method="POST">
                                                    <label for="inputEmail" class="form-label"> </label>
                                                    <input type="email" id="inputEmail" class="form-control" name="useremail" placeholder="Mevcut E-posta Adresin" value="{{$user->email}}" disabled>
                                                    <label for="inputEmailNew" class="form-label"> </label>
                                                    <input type="email" id="inputEmailNew" class="form-control" name="newEmail" placeholder="Yeni E-posta Adresin" required> <br>
                                                    <button type="submit" class="btn" style="background-color: #116c7f; color: #f2f1e9; border: none; width: 100%; height: 40px">
                                                        <h5 class="mtext-111" style="font-size: 15px; color: #f2f1e9">
                                                            E-POSTA ADRESİNİ DEĞİŞTİR
                                                        </h5>
                                                    </button>
                                                    <?php if (isset($_SESSION["errorEmail"])) {
                                                        echo $_SESSION["errorEmail"];
                                                    } ?>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
