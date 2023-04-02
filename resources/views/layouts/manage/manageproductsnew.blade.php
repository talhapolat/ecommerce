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
<div class="page">
    <!-- Main Navbar-->
{{--    @include('layouts.manage.managepartials.manageheader')--}}

    <div class="page-content d-flex align-items-stretch">

        @include('layouts.manage.managepartials.managenavbar')

        <div class="content-inner w-100">
            <!-- Page Header-->
            <header class="bg-white shadow-sm px-4 py-3 z-index-20">
                <div class="container-fluid px-0">
                    <h4 class="mb-0 p-1">Yeni Ürün Oluştur</h4>
                </div>
            </header>


            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0" style="width: 80%; margin: auto">
                        <div class="card-body">

                            <h5>Temel Bilgiler</h5>

                            <div class="row pt-2">
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title">Ürün Başlığı</label>
                                        <input class="form-control" id="product-title" type="text" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-type">Ürün Türü</label>
                                        <div data-test-hook="basic">
                                            <select class="form-control" name="product-type" id="product-type">
                                                <option value="1">Fiziksel Ürün</option>
                                                <option value="2">Dijital Ürün</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-price">Satış Fiyatı</label>
                                        <input class="form-control" id="product-price" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-sale-price">İndirimli Fiyat</label>
                                        <input class="form-control" id="product-sale-price" type="number">
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
                            <h5>Ürün Resimleri</h5>
                            <div class="row gx-5 bg-white pt-2">
                                <div class="container-fluid">
                                    <div class="dropzone dz-clickable" id="myDrop">
                                        <div class="dz-default dz-message" data-dz-message="">
                                            <span>Drop files here to upload</span>
                                            <div class="justify-content-center" style="padding-top: 30px">
                                                <i class="fa-regular fa-images" style="font-size: 30px; color: #6f55ff"></i>
                                                <br>
                                                <a style="font-size: 14px">Medya yüklemek için tıklayın ya da bu alana sürükleyin</a>
                                            </div>
                                        </div>
                                    </div>
                                    <input hidden type="button" id="add_file" value="Add" class="btn btn-primary mt-3">
                                </div>
{{--                                <hr class="my-5">--}}
                            </div>

                        </div>
                    </div>
                </div>
            </section>





            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0" style="width: 80%; margin: auto">
                        <div class="card-body">
                            <h5>Özelleştir</h5>
                            <div class="row gx-5 bg-white pt-2">
                                <div class="container-fluid">
                                            <form>
                                                <div class="form-group">
                                                    <label class="form-label">Ürün özelleştirmelerinizi seçiniz. Ürün kombinasyonları otomatik oluşacaktır.</label>
                                                    <select id="product-variation" multiple="multiple" name="product-variation">
                                                        @foreach($options as $option)
                                                            <optgroup label="{{$option->title}}">
                                                                @foreach($suboptions as $suboption)
                                                                    @if($suboption->option_id == $option->id)
                                                                        <option value="{{$suboption->id}}">{{$suboption->title}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </form>
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
                            <h5>Açıklama</h5>
                            <div class="row gx-5 bg-white pt-2">
                                <div class="container-fluid">
                                    <div id="editor">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0" style="width: 80%; margin: auto;">
                        <div class="card-body">
                            <h5>Ürün Detayları</h5>
                            <div class="row gx-5 bg-white pt-2">

                                <div class="col-4">
                                    <label for="product-category">Kategori</label>
                                    <select
                                        class="form-control"
                                        name="product-category"
                                        id="product-category"
                                        placeholder="Kategori Seçin"
                                        multiple
                                    >
                                        @foreach($categories as $category)
                                            <optgroup label="{{$category->name}}">

                                                @foreach($subcategories as $subcategory)

                                                    @if($subcategory->main_category_id == $category->id)
                                                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                    @endif

                                                @endforeach

                                            </optgroup>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="product-tag">Etiket</label>
                                    <select
                                        class="form-control"
                                        name="product-tag"
                                        id="product-tag"
                                        multiple
                                    >
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="product-brand">Marka</label>
                                    <div data-test-hook="basic">
                                        <select class="form-control" name="product-brand" id="product-brand">
                                            <option value="0" selected>Marka Seçin</option>
                                            <option value="1">Choice 1</option>
                                            <option value="2">Choice 2</option>
                                            <option value="3">Choice 3</option>
                                            <option value="4">Choice 4</option>
                                        </select>
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
                            <h5>SEO Ayarları</h5>
                            <div class="row gx-5 bg-white pt-2">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="product-slug">Slug</label>
                                            <div class="input-group">
                                                <div class="input-group-text">/</div>
                                                <input class="form-control" id="product-slug" type="text" placeholder="Ürün Linki" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="product-keyword">Anahtar Kelimeler</label>
                                            <div class="input-group">
                                                <input class="form-control" id="product-keyword" type="text" placeholder="Keywords">
                                            </div>
                                        </div>
                                    </div>


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

                                    <button type="button" id="new-product-draft" class="btn btn-outline-info">Taslak Olarak Kaydet</button>
                                    <button type="button" id="new-product-save" class="btn btn-custom">Kaydet</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Page Footer-->
            <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs" id="footer">
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

<!-- JavaScript files-->
{{--<script src="{{asset('storage/template/manage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
<script src="{{asset('storage/template/manage/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/just-validate/js/just-validate.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('storage/template/manage/js/js-cookie.0d5f0e08.js')}}"> </script>
<script src="{{asset('storage/template/manage/js/demo.bbd40f0c.js')}}"> </script>
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
<script src="{{asset('storage/template/manage/js/home-premium.82d409ff.js')}}"> </script>
<!-- Main File-->
<script src="{{asset('storage/template/manage/js/front.c39dfc0c.js')}}"></script>


<script>
    $(document).ready(function(){
        $('.reorder').on('click',function(){
            $("ul.nav").sortable({ tolerance: 'pointer' });
            $('.reorder').html('Save Reordering');
            $('.reorder').attr("id","updateReorder");
            $('#reorder-msg').slideDown('');
            $('.img-link').attr("href","javascript:;");
            $('.img-link').css("cursor","move");
            $("#updateReorder").click(function( e ){
                if(!$("#updateReorder i").length){
                    $(this).html('').prepend('<i class="fa fa-spin fa-spinner"></i>');
                    $("ul.nav").sortable('destroy');
                    $("#reorder-msg").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');

                    var h = [];
                    $("ul.nav li").each(function() {  h.push($(this).attr('id').substr(9));  });

                    $.ajax({
                        type: "POST",
                        url: "<?php echo HOME_AJAX; ?>update.php",
                        data: {ids: " " + h + ""},
                        success: function(data){
                            if(data==1 || parseInt(data)==1){
                                //window.location.reload();
                            }
                        }
                    });
                    return false;
                }
                e.preventDefault();
            });
        });

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
                uploadMultiple: true,
                autoProcessQueue: false,
                parallelUploads: 50,
                maxFilesize: 5, // MB
                acceptedFiles: ".png, .jpeg, .jpg, .gif",
                url: "/storage/template/manage/dropimage/ajax/action-z.ajax.php",
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
        ajax.onload = function(e) {
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
<link rel="stylesheet" href="{{asset('storage/template/manage/releases/v5.7.1/css/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
    var multipleCancelButton = new Choices(
        '#product-category',
        {
            allowHTML: true,
            removeItemButton: true,
        }
    );

    var multipleCancelButton2 = new Choices(
        '#product-tag',
        {
            allowHTML: true,
            removeItemButton: true,
        }
    );

    const choicesBasic3 = new Choices('#product-type', {
        allowHTML: true,
        shouldSort: false,
        searchEnabled: false,
    });

    const choicesBasic4 = new Choices('#product-brand', {
        allowHTML: true,
        shouldSort: false,
    });


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    document.getElementById('managenavbar').children.item(1).classList.add('active');
</script>
</body>
</html>
