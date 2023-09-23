@php
    require_once(base_path()."/app/func.php");
    ;
    //session(['modalproductg' => '5']);
@endphp

    <!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
@include('layouts.partials.slider')

@include('layouts.partials.banner')

@include('layouts.partials.products')
@include('layouts.partials.footer')
@include('layouts.partials.modalproduct')
@include('layouts.partials.modalcart')

@include('layouts.partials.jsassets')

<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>


</body>

<script>
    $(window).on("load", function (){
        $(".loader-wrapper").fadeOut("slow");
    })
</script>



</html>
