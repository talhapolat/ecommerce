<!DOCTYPE html>
<html>

<head>
    @include('layouts.partials.head')
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

    </div>
</div>

@include('layouts.partials.footer')
@include('layouts.partials.modalproduct')
@include('layouts.partials.modalcart')
@include('layouts.partials.jsassets')

</body>

</html>
