<!DOCTYPE html>
<html>
<head>
    @include('layouts.manage.managepartials.managehead')
</head>
<body>
<div class="page">
    <!-- Main Navbar-->
    @include('layouts.manage.managepartials.managehead')

    @include('layouts.manage.managepartials.managenavbar')
</div>



<!-- JavaScript files-->
<script src="{{asset('storage/template/manage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/just-validate/js/just-validate.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('storage/template/manage/js/js-cookie.0d5f0e08.js')}}"> </script>
<script src="{{asset('storage/template/manage/js/demo.bbd40f0c.js')}}"> </script>
<script src="{{asset('storage/template/manage/js/charts-home.36b080a8.js')}}"></script>
<!-- Notifications  -->
<div class="toast-container position-fixed top-0 end-0 p-4">
    <div class="toast hide bg-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header"><strong class="me-auto">Bootstrap</strong><small>11 mins ago</small>
            <button class="btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Hello, world! This is a toast message.</div>
    </div>
</div>
<script src="{{asset('storage/template/manage/js/home-premium.82d409ff.js')}}"> </script>
<!-- Main File-->
<script src="{{asset('storage/template/manage/js/front.c39dfc0c.js')}}"></script>
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
</body>
</html>
