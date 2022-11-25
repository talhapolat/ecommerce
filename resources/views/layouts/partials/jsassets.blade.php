

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- 	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
--><!--===============================================================================================-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js" integrity="sha512-pYd2QwnzV9JgtoARJf1Ui1q5+p1WHpeAz/M0sUJNprhDviO4zRo12GLlk4/sKBRUCtMHEmjgqo5zcrn8pkdhmQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--===============================================================================================-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous"></script> -->
<!--===============================================================================================-->
<script src={{asset('storage/template/vendor/slick/slick.min.js')}}></script>
<script src={{asset('storage/template/js/slick-custom.js')}}></script>
<!--===============================================================================================-->
<script src={{asset('storage/template/vendor/parallax100/parallax100.js')}}></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>
<!--===============================================================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $('.js-addwish-b2').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        var pid = $(this).attr('data-id');

        $(this).on('click', function(){

            if ($(this).hasClass('js-addwish-b2')) {
                $.ajax({
                    type: "POST",
                    url: '../app/addList.php',
                    data: ({
                        id: pid
                    }),
                    success:function(result) {

                    }
                });
                swal(nameProduct, "Listenize Eklendi !", "success");
                $(this).removeClass('js-addwish-b2');
                $(this).addClass('js-addedwish-b2');

            } else {
                $.ajax({
                    type: "POST",
                    url: '../app/removeList.php',
                    data: ({
                        id: pid
                    }),
                    success:function(result) {

                    }
                });
                swal(nameProduct, "Listenizden çıkartıldı !", "success");
                $(this).removeClass('js-addedwish-b2');
                $(this).addClass('js-addwish-b2');
            }

        });
    });

    $('.js-addedwish-b2').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addedwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        var pid = $(this).attr('data-id');
        $(this).on('click', function(){


            if ($(this).hasClass('js-addwish-b2')) {
                $.ajax({
                    type: "POST",
                    url: '../app/addList.php',
                    data: ({
                        id: pid
                    }),
                    success:function(result) {

                    }
                });
                swal(nameProduct, "Favorilerinize Eklendi !", "success");
                $(this).removeClass('js-addwish-b2');
                $(this).addClass('js-addedwish-b2');

            } else {
                $.ajax({
                    type: "POST",
                    url: '../app/removeList.php',
                    data: ({
                        id: pid
                    }),
                    success:function(result) {

                    }
                });
                swal(nameProduct, "Favorilerinizden çıkartıldı !", "success");
                $(this).removeClass('js-addedwish-b2');
                $(this).addClass('js-addwish-b2');
            }

        });
    });





    $('.js-addwish-detail').each(function(){
        // var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            var nameProduct = document.getElementById("modelptitle").innerHTML;
            var pid = $(this).attr('data-id');

            if ($(this).hasClass('js-addwish-detail')) {
                $.ajax({
                    type: "POST",
                    url: '../app/addList.php',
                    data: ({
                        id: pid
                    }),
                    success:function(result) {

                    }
                });

                swal(nameProduct, "Listenize Eklendi !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).removeClass('js-addwish-detail');
            } else {
                $.ajax({
                    type: "POST",
                    url: '../app/removeList.php',
                    data: ({
                        id: pid
                    }),
                    success:function(result) {

                    }
                });

                swal(nameProduct, "Listenizden Çıkartıldı !", "success");

                $(this).addClass('js-addwish-detail');
                $(this).removeClass('js-addedwish-detail');
            }


        });
    });


    $('.js-addedwish-detail').each(function(){
        // var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            var nameProduct = document.getElementById("modelptitle").innerHTML;
            var pid = $(this).attr('data-id');

            if ($(this).hasClass('js-addwish-detail')) {
                $.ajax({
                    type: "POST",
                    url: '../app/addList.php',
                    data: ({
                        id: pid
                    }),
                    success:function(result) {

                    }
                });
                swal(nameProduct, "Listenize Eklendi !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).removeClass('js-addwish-detail');

            } else {
                $.ajax({
                    type: "POST",
                    url: '../app/removeList.php',
                    data: ({
                        id: pid
                    }),
                    success:function(result) {

                    }
                });
                swal(nameProduct, "Listenizden Çıkartıldı !", "success");

                $(this).addClass('js-addwish-detail');
                $(this).removeClass('js-addedwish-detail');

            }


        });
    });

    $('.signup').on('click', function(e){
        swal({
            title: "AHLAT'a KAYIT OL",
            text: "Giriş yaparak indirimlerden yararlanabilir, siparişlerinizi takip edebilir ve zaman kazanabilirsiniz.",
            buttons: {
                catch: {
                    text: "GİRİŞ YAP",
                    value: "catch",
                },
                cancel: "İPTAL",
            },
        })
            .then((value) => {
                switch (value) {
                    case "catch":
                        window.location.href = "/register";
                        break;
                }
            });

    });





    /*---------------------------------------------*/

    $(document).ready(function(){





        $('#selectoption1').change(function(){
            if (slug=="") {
                var slug = "0";
            } else {
                var slug = location.pathname.split('/').slice(2);
            }
            if (document.getElementById("selectoption2") != null)
                document.getElementById("selectoption2").innerHTML = "";
            //Selected value
            var inputValue = $(this).val();

            //Ajax for calling php function
            $.get("{{ route('getOption2') }}", {
                dropdownValue: inputValue,
                slug: slug,
                pid: $('#addCartButton').attr('data-id')
            }, function(data){

                //do after submission operation in DOM

                var area = document.getElementById("selectoption2");

                array = JSON.parse(data);

                for (i = 0; i < array.length; i++) {
                    var section = document.createElement("option");
                    section.innerHTML = '<option value="' + "option" + '">' + array[i]["title"] + '</option>';
                    area.appendChild(section);
                }

            });
        });
    });


    $('.js-addcart-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function(e){
            var titleProduct = document.getElementById("modelptitle").innerHTML;
            var imageProduct = document.getElementById("modelpimage").getAttribute('src');
            var priceProduct = document.getElementById("modelpprice").innerHTML;
            var qty = document.getElementById("num-product").value;

            if (document.getElementById("selectoption1") !== null) {
                var option1		 = document.getElementById("selectoption1").value;
            }
            if (document.getElementById("selectoption2") !== null) {
                var option2		 = document.getElementById("selectoption2").value;
            }


            e.preventDefault();
            var pid = $(this).attr('data-id');

            $(document).ready(function() {

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "GET",
                    url: '{{ route('addcart') }}',
                    data: {
                        id: pid,
                        title: titleProduct,
                        image: imageProduct,
                        price: priceProduct,
                        option1: option1,
                        option2: option2,
                        qty: qty
                    },
                    dataType: 'json',
                    success:function(result) {
                        var ul = document.getElementById("cartlist");



                        if (result[1] != "999") {

                            var items = document.querySelectorAll("#cartlist li"),
                                tab = [], index;

                            var cartproductqty = items[result[1]].children[1].children[1].children[0].innerHTML;
                            items[result[1]].children[1].children[1].children[0].innerHTML = parseInt(cartproductqty) + parseInt(qty);


                        } else {

                            var li = document.createElement("li");

                            if(option1 === undefined){option1=""};
                            if(option2 === undefined){option2=""};

                            li.innerHTML =
                                '<div class="header-cart-item-img" onclick="deletecart('+(ul.getElementsByTagName("li").length)+')">' +
                                '<img src='+imageProduct+' alt="IMG">' +
                                '</div>' +

                                '<div class="header-cart-item-txt p-t-8">' +
                                '<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">' +
                                titleProduct +
                                '</a>' +

                                '<span class="header-cart-item-info">' +
                                '<span id="cartproductqty">' + qty + '</span> x '+priceProduct+'₺' +
                                '<small style="float: right;">' +
                                option1 +
                                ' ' + option2 +
                                '</small> '
                            '</span>' +
                            '</div>';

                            li.classList.add("header-cart-item");
                            li.classList.add("flex-w");
                            li.classList.add("flex-t");
                            li.classList.add("m-b-12");

                            ul.appendChild(li);

                        }

                        var cn = parseInt(document.getElementById("cartnoti").getAttribute("data-notify"));
                        document.getElementById("cartnoti").setAttribute("data-notify", cn + parseInt(qty));
                        document.getElementById("cartnotimobil").setAttribute("data-notify", cn + parseInt(qty));
                        document.getElementById("header-cart-totall").innerHTML = "Toplam: " + result[0] + "₺";
                    }
                });
            });
            $('.js-modal1').removeClass('show-modal1');
            $('.js-panel-cart').addClass('show-header-cart');
            swal({
                title: titleProduct,
                text: "Sepetinize Eklendi",
                icon: imageProduct,
                buttons: false,
                timer: 2000
            });
            // swal(nameProduct, "Sepetinize Eklendi", "success");
        });
    });


    $('#newaddress').on('click',function(){
        $.ajax({
            type: 'POST',
            url: 'newaddresscont.php',
            data: ({
                name: document.getElementById("name").value,
                username: document.getElementById("username").value,
                usersurname: document.getElementById("usersurname").value,
                city: document.getElementById("city").value,
                state: document.getElementById("state").value,
                userphone: document.getElementById("userphone").value,
                address: document.getElementById("address").value,
            }),

            success:function(result) {

            }
        });

    });



    /*==================================================================
[ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        var pid = $(this).attr('data-id');

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('getProduct') }}',
                type: "GET",
                data: { pid: pid },
                dataType: 'json',
                success:function(result) {

                    var type = "{{ session(['modalproductg' => '2'])}}";



                    $("#modelptitle").html(result[0]);
                    $("#modelpprice").html(result[1]);
                    $("#modelpdesc").html(result[2]);

                    document.getElementById("modelpimage").src = '/storage/' + result[3];

                    document.getElementById("addCartButton").setAttribute("data-id", result[4]);
                    document.getElementById("num-product").value = 1;
                    document.getElementById("favoritebuttons").children[0].setAttribute("data-id", result[4]);

                    document.getElementById("option1text").innerHTML = result[6];
                    document.getElementById("option2text").innerHTML = result[7];
                    if (result[6] == null){
                        const element = document.getElementById("option1text").parentElement;
                        element.style.display = "none";
                    }
                    if (result[7] == null){
                        const element = document.getElementById("option2text").parentElement;
                        element.style.display = "none";
                    }

                    if (result[5]) {
                        document.getElementById("favoritebuttons").children[0].setAttribute("data-tooltip", "Favorilere Ekle");
                        document.getElementById("favoritebuttons").children[0].classList.add('js-addedwish-detail');
                        document.getElementById("favoritebuttons").children[0].classList.remove('js-addwish-detail');
                    } else {
                        document.getElementById("favoritebuttons").children[0].setAttribute("data-tooltip", "Favorilere Ekle");
                        document.getElementById("favoritebuttons").children[0].classList.add('js-addwish-detail');
                        document.getElementById("favoritebuttons").children[0].classList.remove('js-addedwish-detail');
                    }


                }
            });
        });


        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: '{{ route('getProductGallery') }}',
                data: { pid: pid },
                dataType: 'json',
                success:function(resultt) {
                    $i=1;
                    $cnt = resultt.length;


                    var gallerylist = document.querySelectorAll("#productgalery");

                    // lis[0].children[0].style.display = "none";
                    // lis[0].children[1].style.display = "none";
                    // lis[0].children[2].style.display = "none";
                    // lis[0].children[3].style.display = "none";
                    // lis[0].children[4].style.display = "none";
                    // lis[0].children[5].style.display = "none";


                    // gallerylist[0].children[0].children[0].children[0].style.display = "none";
                    // gallerylist[0].children[0].children[0].children[1].style.display = "none";
                    // gallerylist[0].children[0].children[0].children[2].style.display = "none";
                    // gallerylist[0].children[0].children[0].children[3].style.display = "none";
                    // gallerylist[0].children[0].children[0].children[4].style.display = "none";
                    // gallerylist[0].children[0].children[0].children[5].style.display = "none";





                    while($i < $cnt) {
                        $('.slick3').slick('slickAdd','<div>' +
                            '<div class="wrap-pic-w pos-relative">' +
                            '<img src="/storage/'+resultt[$i]+'" alt="IMG-PRODUCT">' +
                            '<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">' +
                            '<i class="fa fa-expand"></i>' +
                            '</a>' +
                            '</div>' +
                            '</div>');

                        // gallerylist[0].children[0].children[0].children[$i].style.display = "block";
                        // gallerylist[0].children[0].children[0].children[$i+1].children[0].children[0].src = '/storage/' + resultt[$i+1];
                        // gallerylist[0].children[0].children[0].children[$i+1].children[0].children[1].href = '/storage/' + resultt[$i+1];

                        $i = $i+1;
                    }

                    //lis[0].children[0].style.display = "block";
                    //lis[0].children[0].children[0].src = "http://127.0.0.1:8000/storage/template/images/icons/logo-01.png";

                    //alert(lis[0].children[0].children[0].src);

                    var lis = document.querySelectorAll(".slick3-dots");
                    $p = 1

                    lis[0].children[0].style.display = "block";
                    lis[0].children[0].children[0].src = "/storage/"+resultt[0];

                    while ($p < $cnt) {

                        lis[0].children[$p].style.display = "block";
                        lis[0].children[$p].children[0].src = "/storage/"+resultt[$p];

                        $p = $p+1;
                    }

                    //lis[0].children[0].click();

                    $('.js-modal1').addClass('opacity100');


                }
            });
        });

        document.getElementById("selectoption1").innerHTML = "";
        document.getElementById("selectoption2").innerHTML = "";
        //Selected value
        var inputValue = $(this).val();
        var pid = $(this).attr('data-id');

        //Ajax for calling php function
        $.get("{{ route('getOption1') }}", {
            pid: pid
        }, function(data){
            //do after submission operation in DOM
            array = JSON.parse(data);
            if (array == null) {
                document.getElementById("option1panel").style.visibility='hidden';
                document.getElementById("option1panel").style.position='absolute';
            } else {
                document.getElementById("option1panel").style.visibility='visible';
                document.getElementById("option1panel").style.position='relative';
            }
            var area = document.getElementById("selectoption1");

            for (i = 0; i < array.length; i++) {
                var section = document.createElement("option");
                section.innerHTML = '<option value="' + "option" + '">' + array[i]["title"] + '</option>';
                area.appendChild(section);
            }
        });

        $.get("{{ route('getOption2first') }}", {
            pid: pid
        }, function(data2){
            //do after submission operation in DOM
            array2 = JSON.parse(data2);
            if (array2 == null) {
                document.getElementById("option2panel").style.visibility='hidden';
                document.getElementById("option2panel").style.position='absolute';
            } else {
                document.getElementById("option2panel").style.visibility='visible';
                document.getElementById("option2panel").style.position='relative';
            }

            var area2 = document.getElementById("selectoption2");

            for (k = 0; k < array2.length; k++) {
                var section2 = document.createElement("option");
                section2.innerHTML = '<option value="' + "option" + '">' + array2[k]["title"] + '</option>';
                area2.appendChild(section2);
            }
        });

        setTimeout(showmodal, 100);
        function showmodal(){
            $('.js-modal1').addClass('show-modal1');
        };
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
        setTimeout(deletemodal, 400);
        function deletemodal(){
            $("#modelptitle").html("");
            $("#modelpprice").html("");
            $("#modelpdesc").html("");
            document.getElementById("modelpimage").src = '';


            var lis = document.querySelectorAll(".slick3-dots");
            var gallerylist = document.querySelectorAll("#productgalery");

            var lisl = $('.slick3-dots li').length;

            var l = 0;

            while (lisl-1 > 0) {
                $('.slick3').slick('slickRemove',lisl-1);
                lisl--;
            };


            // lis[0].children[0].children[0].src = '';
            // lis[0].children[1].children[0].src = '';
            // lis[0].children[2].children[0].src = '';
            // lis[0].children[3].children[0].src = '';
            // lis[0].children[4].children[0].src = '';
            // lis[0].children[5].children[0].src = '';
            //
            // lis[0].children[0].style.display = "none";
            // lis[0].children[1].style.display = "none";
            // lis[0].children[2].style.display = "none";
            // lis[0].children[3].style.display = "none";
            // lis[0].children[4].style.display = "none";
            // lis[0].children[5].style.display = "none";
            //
            //
            //
            // gallerylist[0].children[0].children[0].children[0].children[0].children[0].src = '';
            // gallerylist[0].children[0].children[0].children[1].children[0].children[0].src = '';
            // gallerylist[0].children[0].children[0].children[2].children[0].children[0].src = '';
            // gallerylist[0].children[0].children[0].children[3].children[0].children[0].src = '';
            // gallerylist[0].children[0].children[0].children[4].children[0].children[0].src = '';
            // gallerylist[0].children[0].children[0].children[5].children[0].children[0].src = '';
            //
            //
            // gallerylist[0].children[0].children[0].children[1].style.display = "none";
            // gallerylist[0].children[0].children[0].children[2].style.display = "none";
            // gallerylist[0].children[0].children[0].children[3].style.display = "none";
            // gallerylist[0].children[0].children[0].children[4].style.display = "none";
            // gallerylist[0].children[0].children[0].children[5].style.display = "none";

            const element = document.getElementById("option1text").parentElement;
            const element2 = document.getElementById("option2text").parentElement;
            element.style.display = "block";
            element2.style.display = "block";


        };

        // location.reload();

        $('.js-modal1').removeClass('opacity100');

    });


    $('.alreadymember').on('click',function(){
        window.location.href = "/login";
    });



</script>
<!--===============================================================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });


    function deletecart(key) {
        window.location.href = "/deletecart?key=" + key;
    }


</script>
<!--===============================================================================================-->
<script src={{asset('storage/template/js/main.js')}}></script>
