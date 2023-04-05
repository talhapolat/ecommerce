@php
    include_once('storage/template/manage/dropimage/config.php');
@endphp
    <!DOCTYPE html>
<html>
<head>
    @include('layouts.manage.managepartials.managehead')
    <link rel="stylesheet" href="{{asset('storage/template/manage/dropimage/dropzone/dropzone.css')}}" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>

<div class="page">
    <!-- Main Navbar-->
    {{--    @include('layouts.manage.managepartials.manageheader')--}}

    <div class="page-content d-flex align-items-stretch">

        <div class="content-inner w-100">
            <!-- Page Header-->
            <header class="bg-white shadow-sm px-4 py-3 z-index-20">
                <div class="container-fluid px-0">
                    <h4 class="mb-0 p-1">{{$variation->title}} Ekle</h4>
                </div>
            </header>


            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0 text-center" style="width: 80%; margin: auto">
                        <div class="card-body">
                            <h5>{{$variation->title}}</h5>
                            <div class="row pt-2">
                                <div class="col-12 ">
                                    <div class="mb-3 ">
                                        <input class="form-control" value="{{$category->name}}" id="category-title" type="text" required>
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
                                <div class="container-fluid text-center">

                                    <button type="button" id="new-category-save" class="btn btn-custom">Kaydet</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>

</div>


@include('layouts.manage.managepartials.managefooter')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

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
            setTimeout(function(){window.location.href="#"},800);

            //alert("aaa");
            picarray = message.split("ppp");
            picarraysize = picarray.length;

            //delete picarray[0];
            //alert(picarray[0]);

            const node = document.getElementById("navpills").lastElementChild;

            const galeryelement = document.createElement("li");
            galeryelement.id = 888;
            galeryelement.classList.add('ui-sortable-handle');
            galeryelement.classList.add('mr-2');
            galeryelement.classList.add('mt-2');


            if (node == null) {
                galeryelement.dataset.ord = "0";
                galeryelement.innerHTML = '<div> <a href="javascript:;" class="img-link" style="cursor: move;"> ' +
                    '<img src="/storage/template/manage/dropimage/uploads/'+picarray[0]+'" alt="" class="img-thumbnail" width="200px" ' +
                    'style="object-fit: contain!important; height: 200px"> </a> ' +
                    '</div> '
                ;
            } else {
                i = 0;
                while(i<picarraysize-1){

                    pictures = document.getElementById("navpills").innerHTML;

                    if (pictures.search(picarray[i])<1){
                        galeryelement.innerHTML = '<div> <a href="javascript:;" class="img-link" style="cursor: move;"> ' +
                            '<img src="/storage/template/manage/dropimage/uploads/'+picarray[i]+'" alt="" class="img-thumbnail" width="200px" ' +
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

        myDropzone.on("complete", function(file) {
            myDropzone.removeFile(file);

            //alert("bbb");

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


    const choicesBasic3 = new Choices('#category-statu', {
        allowHTML: true,
        shouldSort: false,
        searchEnabled: false,
    });

    const choicesBasic4 = new Choices('#main-category', {
        allowHTML: true,
        shouldSort: false,
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
    document.getElementById('managenavbar').children.item(2).classList.add('active');
</script>
</body>
</html>

