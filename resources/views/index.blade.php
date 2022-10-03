@php
    require_once("../app/func.php");
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


</body>

</html>
