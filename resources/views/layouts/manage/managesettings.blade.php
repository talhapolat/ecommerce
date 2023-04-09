@php
    include_once('storage/template/manage/dropimage/config.php');
@endphp
    <!DOCTYPE html>
<html>
<head>
    @include('layouts.manage.managepartials.managehead')
    <link rel="stylesheet" href="{{asset('storage/template/manage/dropimage/dropzone/dropzone.css')}}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script
        src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
        integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>

<style>
    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw0zKknEf_ExsMDMYCkGnkF4bvK-dRrBJb9FdYBJOO0vy5H15IsJSpMBSlVDz7bt6BKCk&usqp=CAU);
        background-size: contain;
        background-repeat:no-repeat;
        display: inline-block;
    }
    .btn-primary
    {
        display:block;
        border-radius:0px;
        box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
        margin-top:-5px;
    }
    .imgUp
    {
        margin-bottom:15px;
    }
    .del
    {
        position:absolute;
        top:0px;
        right:15px;
        width:30px;
        height:30px;
        text-align:center;
        line-height:30px;
        background-color:rgba(255,255,255,0.6);
        cursor:pointer;
    }
    .imgAdd
    {
        width:30px;
        height:30px;
        border-radius:50%;
        background-color:#4bd7ef;
        color:#fff;
        box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
        text-align:center;
        line-height:30px;
        margin-top:0px;
        cursor:pointer;
        font-size:15px;
    }
</style>

<div class="page">
    <!-- Main Navbar-->
    {{--    @include('layouts.manage.managepartials.manageheader')--}}

    <div class="page-content d-flex align-items-stretch">

        @include('layouts.manage.managepartials.managenavbar')

        <div class="content-inner w-100">
            <!-- Page Header-->
            <header class="bg-white shadow-sm px-4 py-3 z-index-20">
                <div class="container-fluid px-0">
                    <h4 class="mb-0 p-1">Ayarlar</h4>
                </div>
            </header>


            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0" style="width: 80%; margin: auto">
                        <div class="card-body">

                            <h5>Genel Ayarlar</h5>

                            <div class="row pt-2">
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="store-title">Mağaza Adı</label>
                                        <input class="form-control" value="{{$settings[0]->value}}" id="store-title"
                                               type="text" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="store-statu">Mağaza Durumu</label>
                                        <div data-test-hook="basic">
                                            <select class="form-control" name="store-statu" id="store-statu">
                                                <option @if($settings[3]->value == 1) selected @endif value="1">Aktif
                                                </option>
                                                <option @if($settings[3]->value == 2) selected @endif value="2">Pasif
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="language">Varsayılan Dil</label>
                                        <div data-test-hook="basic">
                                            <select class="form-control" name="language" id="language">
                                                <option @if($settings[4]->value == 1) selected @endif value="1">Aktif
                                                </option>
                                                <option @if($settings[4]->value == 2) selected @endif value="2">Pasif
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="currency">Para Birimi</label>
                                        <div data-test-hook="basic">
                                            <select class="form-control" name="currency" id="currency">
                                                <option @if($settings[5]->value == 1) selected @endif value="1">Aktif
                                                </option>
                                                <option @if($settings[5]->value == 2) selected @endif value="2">Pasif
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">İletişim Numarası</label>
                                        <input class="form-control" value="{{$settings[6]->value}}" id="phone"
                                               type="text" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0" style="width: 80%; margin: auto">
                        <div class="card-body">

                            <h5>Adres Bilgileri</h5>

                            <div class="row pt-2">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="address-name">Ad</label>
                                        <input class="form-control" value="{{$settings[7]->value}}" id="address-name"
                                               type="text" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="address-surname">Soyad</label>
                                        <input class="form-control" value="{{$settings[8]->value}}" id="address-surname"
                                               type="text" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="company-title">Şirket Unvanı</label>
                                        <input class="form-control" value="{{$settings[9]->value}}" id="company-title"
                                               type="text" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="tax-number">Vergi Numarası</label>
                                        <input class="form-control" value="{{$settings[10]->value}}" id="tax-number"
                                               type="text" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="tax-office">Vergi Dairesi</label>
                                        <input class="form-control" value="{{$settings[11]->value}}" id="tax-office"
                                               type="text" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row pt-2">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="address-country">Ülke</label>
                                        <div data-test-hook="basic">
                                            <select class="form-control" name="address-country" id="address-country">
                                                <option @if($settings[12]->value == 1) selected @endif value="1">Türkiye
                                                </option>
                                                <option @if($settings[12]->value == 2) selected @endif value="2">Almanya
                                                </option>
                                                <option @if($settings[12]->value == 3) selected @endif value="3">Rusya
                                                </option>
                                                <option @if($settings[12]->value == 4) selected @endif value="4">Amerika
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="address-city">Şehir</label>
                                        <div data-test-hook="basic">
                                            <select class="form-control" name="address-city" id="address-city">
                                                <option @if($settings[13]->value == 1) selected @endif value="1">İstanbul
                                                </option>
                                                <option @if($settings[13]->value == 2) selected @endif value="2">Ankara
                                                </option>
                                                <option @if($settings[13]->value == 2) selected @endif value="2">İzmir
                                                </option>
                                                <option @if($settings[13]->value == 2) selected @endif value="2">Antalya
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="address-district">İlçe</label>
                                        <div data-test-hook="basic">
                                            <select class="form-control" name="address-district" id="address-district">
                                                <option @if($settings[14]->value == 1) selected @endif value="1">Beyoğlu
                                                </option>
                                                <option @if($settings[14]->value == 2) selected @endif value="2">Şişli
                                                </option>
                                                <option @if($settings[14]->value == 2) selected @endif value="2">Beşiktaş
                                                </option>
                                                <option @if($settings[14]->value == 2) selected @endif value="2">Kadıköy
                                                </option>
                                                <option @if($settings[14]->value == 2) selected @endif value="2">Pendik
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="full-address">Açık Adres</label>
                                        <input class="form-control" value="{{$settings[15]->value}}" id="full-address"
                                               type="text" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="postcode">Posta Kodu</label>
                                        <input class="form-control" value="{{$settings[16]->value}}" id="postcode"
                                               type="text" required>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </section>


            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0" style="width: 80%; margin: auto">
                        <div class="card-body">
                            <h5>Mağaza Açıklaması</h5>
                            <div class="row gx-5 bg-white pt-2">
                                <div class="container-fluid">
                                    <div id="editor">
                                        {!! $settings[1]->value !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0" style="width: 80%; margin: auto">
                        <div class="card-body">
                            <h5>Logo Ayarları</h5>

                            <div class="row">
                                <div class="col-2 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-custom">
                                        Logo Yükle<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>

            <section class="pb-0 mb-4">
                <div class="container-fluid">
                    <div class="card mb-0" style="width: 80%; margin: auto">
                        <div class="card-body">
                            {{--                            <h5>Açıklama</h5>--}}
                            <div class="row gx-5 bg-white pt-2">
                                <div class="container-fluid text-right">

                                    <button type="button" id="settings-update"
                                            class="btn btn-custom">Kaydet
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Page Footer-->
            <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs"
                    id="footer">
                <div class="container-fluid">
                    <div class="row gy-2">
                        <div class="col-sm-6 text-sm-start">
                            <p class="mb-0">Ahlat &copy; 2022</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <p class="mb-0">Version 2.0.1</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</div>


@include('layouts.manage.managepartials.managefooter')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="{{asset('storage/template/manage/dropimage/dropzone/dropzone.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{!! Toastr::message() !!}

<!-- JavaScript files-->
{{--<script src="{{asset('storage/template/manage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
<script src="{{asset('storage/template/manage/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/just-validate/js/just-validate.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('storage/template/manage/js/js-cookie.0d5f0e08.js')}}"></script>
<script src="{{asset('storage/template/manage/js/demo.bbd40f0c.js')}}"></script>
<script src="{{asset('storage/template/manage/js/charts-home.36b080a8.js')}}"></script>
<!-- Notifications  -->
{{--<div class="toast-container position-fixed top-0 end-0 p-4">--}}
{{--    <div class="toast hide bg-white" role="alert" aria-live="assertive" aria-atomic="true">--}}
{{--        <div class="toast-header"><strong class="me-auto">Bootstrap</strong><small>11 mins ago</small>--}}
{{--            <button class="btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>--}}
{{--        </div>--}}
{{--        <div class="toast-body">Hello, world! This is a toast message.</div>--}}
{{--    </div>--}}
{{--</div>--}}
<script src="{{asset('storage/template/manage/js/home-premium.82d409ff.js')}}"></script>
<!-- Main File-->
<script src="{{asset('storage/template/manage/js/front.c39dfc0c.js')}}"></script>

<script>
    $(".imgAdd").click(function(){
        $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });
    $(document).on("click", "i.del" , function() {
        $(this).parent().remove();
    });
    $(function() {
        $(document).on("change",".uploadFile", function()
        {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function(){ // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                }
            }

        });
    });
</script>

<script>
    $(document).ready(function(){


        $(function() {
            $("#myDrop").sortable({
                items: '.dz-preview',
                cursor: 'move',
                opacity: 0.5,
                containment: '#myDrop',
                distance: 20,
                tolerance: 'pointer',
            });

            $("#myDrop").disableSelection();
        });

        //Dropzone script
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("div#myDrop",
            {
                paramName: "files", // The name that will be used to transfer the file
                addRemoveLinks: true,
                uploadMultiple: false,
                autoProcessQueue: false,
                parallelUploads: 1,
                maxFilesize: 5, // MB
                acceptedFiles: ".png, .jpeg, .jpg, .gif",
                url: "/storage/template/manage/dropimage/ajax/action-z.ajax.php",
                maxFiles: 1
            });

        myDropzone.on("maxfilesexceeded", function(file) {
            myDropzone.removeFile(file);
        });

        myDropzone.on("sending", function(file, xhr, formData) {
            var filenames = [];

            $('.dz-preview .dz-filename').each(function() {
                filenames.push($(this).find('span').text());
            });

            formData.append('filenames', filenames);
        });

        /* Add Files Script*/
        myDropzone.on("success", function(file, message){
            $("#msg").html(message);
            setTimeout(function(){window.location.href="#"},200);
        });

        myDropzone.on("error", function (data) {
            $("#msg").html('<div class="alert alert-danger">There is some thing wrong, Please try again!</div>');
        });

        myDropzone.on("complete", function(file) {
            myDropzone.removeFile(file);
        });

        $("#add_file").on("click",function (){
            myDropzone.processQueue();
        });

    });
</script>

<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function (e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }

    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');


</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="{{asset('storage/template/manage/releases/v5.7.1/css/all.css')}}"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<script>
    var select = document.getElementById("product-variation");
    multi(select, {
        enable_search: true
    });
</script>

<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>

<script>


    const choicesBasic3 = new Choices('#store-statu', {
        allowHTML: true,
        shouldSort: false,
        searchEnabled: false,
    });

    const choicesBasic4 = new Choices('#language', {
        allowHTML: true,
        shouldSort: false,
        searchEnabled: false,
    });

    const choicesBasic5 = new Choices('#currency', {
        allowHTML: true,
        shouldSort: false,
        searchEnabled: false,
    });

    const choicesBasic6 = new Choices('#address-country', {
        allowHTML: true,
        shouldSort: false,
        searchEnabled: false,
    });

    const choicesBasic7 = new Choices('#address-city', {
        allowHTML: true,
        shouldSort: false,
        searchEnabled: false,
    });

    const choicesBasic8 = new Choices('#address-district', {
        allowHTML: true,
        shouldSort: false,
        searchEnabled: false,
    });



    // var multipleCancelButton = new Choices(
    //     '#product-category',
    //     {
    //         allowHTML: true,
    //         removeItemButton: true,
    //     }
    // );
    //
    // var multipleCancelButton2 = new Choices(
    //     '#product-tag',
    //     {
    //         allowHTML: true,
    //         removeItemButton: true,
    //     }
    // );


</script>
<script>
    document.getElementById('managenavbar').children.item(11).classList.add('active');
</script>
</body>
</html>
