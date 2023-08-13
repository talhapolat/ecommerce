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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
                    <h4 class="mb-0 p-1">Düzenle</h4>
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
                                        <input class="form-control" value="{{$product->title}}" id="product-title"
                                               type="text" required>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-type">Ürün Türü</label>
                                        <div data-test-hook="basic">
                                            <select class="form-control" name="product-type" id="product-type">
                                                <option @if($product->product_type == 1) selected @endif value="1">
                                                    Fiziksel Ürün
                                                </option>
                                                <option @if($product->product_type == 2) selected @endif value="2">
                                                    Dijital Ürün
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-price">Satış Fiyatı (₺)</label>
                                        <input class="form-control" value="{{$product->price}}" id="product-price"
                                               type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-sale-price">İndirimli Fiyat (₺)</label>
                                        <input class="form-control" value="{{$product->sale_price}}"
                                               id="product-sale-price" type="number">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        @if(sizeof($psuboptions) == 0)
                                            <label class="form-label" for="product_stock">Stok</label>
                                            <input class="form-control" value="{{$product->stock}}"
                                                   id="product_stock" type="number">
                                        @else
                                            <label class="form-label" for="product_stock">Stok <a href="{{route('editproductsstock', $product->id)}}" style="font-size: 12px; color: darkblue">(düzenle)</a></label>
                                            <input class="form-control" value="{{$stock}}"
                                                   id="product_stock" type="number" disabled>
                                        @endif
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
                                                <i class="fa-regular fa-images"
                                                   style="font-size: 30px; color: #6f55ff"></i>
                                                <br>
                                                <a style="font-size: 14px">Medya yüklemek için tıklayın ya da bu alana
                                                    sürükleyin</a>
                                            </div>
                                        </div>
                                    </div>
                                    <input hidden type="button" id="add_file" value="Add" class="btn btn-primary mt-3">
                                </div>
                                {{--                                <hr class="my-5">--}}

                                <div class="container">

                                    {{--                                    <div id="reorder-msg" class="alert alert-warning mt-3" style="display:none;">--}}
                                    {{--                                        <i class="fa fa-3x fa-exclamation-triangle float-right"></i> 1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.--}}
                                    {{--                                    </div>--}}
                                    <div class="gallery">
                                        <ul class="nav nav-pills" id="navpills">
                                            <?php
                                            $optilist = [];
                                            //Fetch all images from database
//                                            $images = $db->getAllRecords(TB_IMG,'*','order by img_order ASC');
                                            if (!empty($images)){
                                            foreach ($images as $key => $row){
                                            if ($images[$key - 1]['img_name'] != $row['img_name']) {
                                                $imgrw = explode(".", $row['img_name']);
                                                ?>

                                            <li id="image_li_<?php echo $row['id']; ?>"
                                                class="ui-sortable-handle mr-2 mt-2">
                                                <div>
                                                    <a onclick="deleteImage({{$imgrw[0]}})"
                                                       style="cursor: pointer;position: absolute; padding-left: 9px; padding-top: 5px; text-decoration: none; color: #0b0b0b">
                                                        <i class="fa-solid fa-x"> </i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="img-link">
                                                        <img src="/storage/galleries/<?php echo $row['img_name']; ?>"
                                                             alt="" class="img-thumbnail" width="200px"
                                                             style="object-fit: contain!important; height: 200px">
                                                    </a>

                                                </div>

                                                @foreach($product_options_uniq as $po => $pou)
                                                    @php($isopt = false)
                                                    @foreach($images as $ky => $opti)
                                                        @if($images[$ky]['img_name'] == $row['img_name'] and $pou == $images[$ky]['option_id'])
                                                            <a class="badge badge-info optionimagebutton"
                                                               style="background-color: #677cdb;cursor: pointer;position: relative; text-decoration: none; color: #ffffff; font-size: 14px; font-weight: lighter"
                                                               onclick="updateOptionImage(<?= $product->id?>,<?= $pou?>,<?= $row->id?>)">
                                                                    <?php
                                                                    $optionTitle = App\Http\Controllers\Manage\ManageProductController::getOptionTitle($pou);
                                                                    ?>
                                                                    <?php echo $optionTitle ?>
                                                            </a>
                                                            @php($isopt = true)
                                                        @endif
                                                    @endforeach
                                                    @if($isopt != true)
                                                        <a class="badge badge-info optionimagebutton"
                                                           style="background-color: #677cdb;opacity: 0.4;border:none; cursor: pointer;position: relative;  text-decoration: none; color: #ffffff; font-size: 14px; font-weight: lighter"
                                                           onclick="updateOptionImage(<?= $product->id?>,<?= $pou?>,<?= $row->id?>)">
                                                                <?php
                                                                $optionTitle = App\Http\Controllers\Manage\ManageProductController::getOptionTitle($pou);
                                                                ?>
                                                                <?php echo $optionTitle ?>
                                                        </a>
                                                    @endif
                                                @endforeach

                                            </li>
                                                <?php
                                            }
                                            }
                                            }
                                            ?>
                                        </ul>
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
                            <h5>Özelleştir</h5>
                            <div class="row gx-5 bg-white pt-2">
                                <div class="container-fluid">
                                    <form>
                                        <div class="form-group">
                                            <label class="form-label">Ürün özelleştirmelerinizi seçiniz. Ürün
                                                kombinasyonları otomatik oluşacaktır.</label>
                                            <select id="product-variation" multiple="multiple" name="product-variation">
                                                @foreach($options as $option)
                                                    <optgroup label="{{$option->title}}">
                                                        @foreach($suboptions as $suboption)
                                                            @if($suboption->option_id == $option->id)
                                                                <option value="{{$suboption->id}}"
                                                                        @if(in_array($suboption->id, $psuboptions)) selected @endif >{{$suboption->title}}</option>
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
                                        {!! $product->longDesc !!}
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
                                        multiple
                                    >
                                        @foreach($categories as $category)
                                            <optgroup label="{{$category->name}}">

                                                @foreach($subcategories as $subcategory)

                                                    @if($subcategory->main_category_id == $category->id)
                                                        <option value="{{$subcategory->id}}"
                                                                @if(in_array($subcategory->id, $pcategoriesid)) selected @endif >{{$category->name}}
                                                            / {{$subcategory->name}}</option>
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
                                            <option value="{{$tag->id}}"
                                                    @if(in_array($tag->id, $ptagsid)) selected @endif>{{$tag->title}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="product-brand">Marka</label>
                                    <div data-test-hook="basic">
                                        <select class="form-control" name="product-brand" id="product-brand">
                                            <option value="0" selected>Marka Seçin</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}"
                                                        @if($brand->id == $product->brand_id) selected @endif>{{$brand->title}}</option>
                                            @endforeach
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
                                                <input class="form-control" value="{{$product->slug}}" id="product-slug"
                                                       type="text" placeholder="Ürün Linki">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="product-keyword">Anahtar Kelimeler</label>
                                            <div class="input-group">
                                                <input class="form-control" id="product-keyword"
                                                       value="{{$product->product_keyword}}" type="text"
                                                       placeholder="Keywords">
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
                                <div class="container-fluid">
                                    <button type="button" id="new-product-draft" class="btn btn-info"
                                            onclick="window.location.href='/manage/products/stock/edit/{{$product->id}}';">
                                        Stok
                                        Ayarları
                                    </button>
                                    <button type="button" id="new-product-edit-save" value="{{$product->id}}"
                                            class="btn btn-custom" style="float: right">Kaydet
                                    </button>
                                    <button type="button" id="new-product-draft" class="btn btn-outline-info mr-1"
                                            style="float: right">Taslak
                                        Olarak Kaydet
                                    </button>
                                    <button type="button" id="new-product-delete" style="float: right"
                                            value="{{$product->id}}"
                                            class="btn btn-outline-danger mr-1">Sil
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

<script>
    function deleteImage($productimageid) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/image/delete",
            method: 'POST',
            data: {
                image_id: $productimageid
            },

            success: function (response) {
                // $(form).trigger("reset");
                toastr.success('Resim silindi.', {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
                document.getElementById('image_li_' + response).remove();
                // window.location.href = '/manage/settings'
            },
            error: function (response) {
                toastr.error('Resim silinirken hata.');
            }
        });


    }


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    $(document).ready(function () {

        $("ul.nav").sortable({tolerance: 'pointer'});
        $('.reorder').html('Sırayı Kaydet');
        $('.reorder').attr("id", "updateReorder");
        $('#reorder-msg').slideDown('');
        $('.img-link').attr("href", "javascript:;");
        $('.img-link').css("cursor", "move");
        $("#updateReorder").click(function (e) {
            if (!$("#updateReorder i").length) {
                $(this).html('').prepend('<i class="fa fa-spin fa-spinner"></i>');
                $("ul.nav").sortable('destroy');
                $("#reorder-msg").html("Reordering Photos - This could take a moment. Please don't navigate away from this page.").removeClass('light_box').addClass('notice notice_error');

                var h = [];
                $("ul.nav li").each(function () {
                    h.push($(this).attr('id').substr(9));
                });

                alert(h);

                $.ajax({
                    type: "POST",
                    url: "<?php echo HOME_AJAX; ?>update.php",
                    data: {ids: " " + h + ""},
                    success: function (data) {
                        if (data == 1 || parseInt(data) == 1) {
                            //window.location.reload();
                        }
                    }
                });
                return false;
            }
            e.preventDefault();
        });

        $(function () {
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
        Dropzone.autoDiscover = true;

        var myDropzone = new Dropzone("div#myDrop",
            {
                paramName: "files", // The name that will be used to transfer the file
                addRemoveLinks: true,
                uploadMultiple: true,
                autoProcessQueue: true,
                parallelUploads: 50,
                maxFilesize: 5, // MB
                acceptedFiles: ".png, .jpeg, .jpg, .gif",
                url: "/storage/template/manage/dropimage/ajax/action-z.ajax.php?pid=" + document.getElementById('new-product-edit-save').value,
            });

        myDropzone.on("sending", function (file, xhr, formData) {
            var filenames = [];

            $('.dz-preview .dz-filename').each(function () {
                filenames.push($(this).find('span').text());
            });

            formData.append('filenames', filenames);

        });

        /* Add Files Script*/
        myDropzone.on("success", function (file, message) {
            $("#msg").html(message);
            setTimeout(function () {
                window.location.href = "#"
            }, 800);

            //alert("aaa");
            picarray = message.split("ppp");
            picarraysize = picarray.length;

            //delete picarray[0];
            //alert(picarray[0]);

            const node = document.getElementById("navpills").lastElementChild;

            const galeryelement = document.createElement("li");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/manage/product/getimage",
                method: 'POST',
                data: {
                    image_name: picarray[0]
                },

                success: function (response) {
                    galeryelement.id = 'image_li_' + response;
                },
                error: function (response) {
                    toastr.error('Resimler yüklenirken hata.');
                }
            });

            galeryelement.classList.add('ui-sortable-handle');
            galeryelement.classList.add('mr-2');
            galeryelement.classList.add('mt-2');

            imgnm = picarray[0].split(".");
            if (node == null) {
                galeryelement.dataset.ord = "0";
                galeryelement.innerHTML = '<div> ' +
                    '<a onclick="deleteImage(' + imgnm[0] + ')" style="cursor: pointer;position: absolute; padding-left: 9px; padding-top: 5px; text-decoration: none; color: #0b0b0b" >' +
                    '<i class="fa-solid fa-x" ></i></a>' +
                    '<a href="javascript:;" class="img-link" style="cursor: move;"> ' +
                    '<img src="/storage/galleries/' + picarray[0] + '" alt="" class="img-thumbnail" width="200px" ' +
                    'style="object-fit: contain!important; height: 200px"> </a> ' +
                    '</div> '
                ;
            } else {
                i = 0;
                while (i < picarraysize - 1) {
                    imgnm = picarray[i].split(".");
                    pictures = document.getElementById("navpills").innerHTML;

                    if (pictures.search(picarray[i]) < 1) {
                        galeryelement.innerHTML = '<div> ' +
                            '<a onclick="deleteImage(' + imgnm[0] + ')" style="cursor: pointer;position: absolute; padding-left: 9px; padding-top: 5px; text-decoration: none; color: #0b0b0b" >' +
                            '<i class="fa-solid fa-x" ></i></a>' +
                            '<a href="javascript:;" class="img-link" style="cursor: move;"> ' +
                            '<img src="/storage/galleries/' + picarray[i] + '" alt="" class="img-thumbnail" width="200px" ' +
                            'style="object-fit: contain!important; height: 200px"> </a> ' +
                            '</div> '
                        ;
                        i = 999;
                    } else {
                        //alert("girdi");
                        i++;
                    }

                    // lastpic = document.getElementById("navpills").lastElementChild.firstElementChild.firstElementChild.firstElementChild.src.split("/");
                    // alert(lastpic[lastpic.length-1]);
                    // alert(picarray[i]);
                    // if (lastpic[lastpic.length-1] != picarray[i]){
                    //     galeryelement.innerHTML = '<div> <a href="javascript:;" class="img-link" style="cursor: move;"> ' +
                    //         '<img src="/storage/template/manage/dropimage/uploads/'+picarray[i]+'" alt="" class="img-thumbnail" width="200px" ' +
                    //         'style="object-fit: contain!important; height: 200px"> </a> ' +
                    //         '</div> '
                    //     ;
                    //     i = 999;
                    // } else {
                    //     //alert("girdi");
                    //     i++;
                    // }

                }


                // cnt = parseInt(node.dataset.ord);
                // galeryelement.dataset.ord = cnt+1;
                // galeryelement.innerHTML = '<div> <a href="javascript:;" class="img-link" style="cursor: move;"> ' +
                //     '<img src="/storage/template/manage/dropimage/uploads/'+picarray[cnt+1]+'" alt="" class="img-thumbnail" width="200px" ' +
                //     'style="object-fit: contain!important; height: 200px"> </a> ' +
                //     '</div> '
                // ;
            }

            //const clone = node.cloneNode(true);
            document.getElementById("navpills").appendChild(galeryelement);


        });

        myDropzone.on("error", function (data) {
            $("#msg").html('<div class="alert alert-danger">There is some thing wrong, Please try again!</div>');
        });

        myDropzone.on("complete", function (file) {
            myDropzone.removeFile(file);

            //alert("bbb");

        });

        $("#add_file").on("click", function () {
            myDropzone.processQueue();
        });

    });
</script>

<script>
    $(window).load(function () {
        $(function () {
            $(".optionimagebutton").click(function () {
                if ($(this).css("opacity") === "1")
                    $(this).css("opacity", "0.4");
                else
                    $(this).css("opacity", "1");
            });
        });
    });
</script>

<script>
    function deleteOptionImage($product, $option, $media) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/deleteoptionimage",
            method: 'POST',
            data: {
                product_id: $product,
                option_id: $option,
                media_id: $media,
            },

            success: function (response) {
                toastr.success('Güncellendi.', {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
            },
            error: function (response) {
                toastr.error('Resimler yüklenirken hata.');
            }
        });

    }

    function insertOptionImage($product, $option, $media) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/insertOptionImage",
            method: 'POST',
            data: {
                product_id: $product,
                option_id: $option,
                media_id: $media,
            },

            success: function (response) {
                toastr.success('Güncellendi.', {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
            },
            error: function (response) {
                toastr.error('Resimler yüklenirken hata.');
            }
        });

    }

    function updateOptionImage($product, $option, $media) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/updateOptionImage",
            method: 'POST',
            data: {
                product_id: $product,
                option_id: $option,
                media_id: $media
            },

            success: function (response) {
                toastr.success('Güncellendi.', {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
            },
            error: function (response) {
                toastr.error('Resimler yüklenirken hata.');
            }
        });

    }
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
<script>
    document.getElementById('managenavbar').children.item(1).classList.add('active');
</script>
</body>
</html>
