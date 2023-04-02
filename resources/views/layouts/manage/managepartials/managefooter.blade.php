
<!-- JavaScript files-->
<script src="{{asset('storage/template/manage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/just-validate/js/just-validate.min.js')}}"></script>
<script src="{{asset('storage/template/manage/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('storage/template/manage/js/js-cookie.0d5f0e08.js')}}"> </script>
<script src="{{asset('storage/template/manage/js/demo.bbd40f0c.js')}}"> </script>
<script src="{{asset('storage/template/manage/js/charts-home.36b080a8.js')}}"></script>

<script src="{{asset('storage/template/manage/vendor/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{asset('storage/template/manage/js/tables-datatable.5bf1d2c4.js')}}"></script>
{{--<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/af-2.5.3/datatables.min.js"></script>--}}

<!-- Bootstrap No UI Slider-->
<script src="{{asset('storage/template/manage/vendor/nouislider/nouislider.min.js')}}"></script>
<!-- vanillajs DatePicker-->
<script src="{{asset('storage/template/manage/vendor/vanillajs-datepicker/js/datepicker.min.js')}}"></script>
<!-- Imask-->
<script src="{{asset('storage/template/manage/vendor/imask/imask.min.js')}}"> </script>
<!-- Mutli.js Multiselect-->
<script src="{{asset('storage/template/manage/vendor/multi.js/multi.min.js')}}"> </script>
<!-- Forms init-->
<script src="{{asset('storage/template/manage/js/forms-advanced.4d07aee4.js')}}"></script>
<!-- Main File-->
<script src="{{asset('storage/template/manage/js/front.c39dfc0c.js')}}"></script>
<script src="{{asset('storage/template/manage/js/custom.js')}}"></script>
{{--<script src="{{asset('storage/template/manage/js/multi.js')}}"></script>--}}
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>


<script>
    new window.simpleDatatables.DataTable("table");
</script>

<script>

    // $(document).ready(function () {
    //     $('#datatablecategory').DataTable({
    //         search: {
    //             return: true,
    //         },
    //     });
    // });
</script>



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

    $(document).ready( function () {
        $('#datatable').DataTable();
    } );


</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="{{asset('storage/template/manage/releases/v5.7.1/css/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
