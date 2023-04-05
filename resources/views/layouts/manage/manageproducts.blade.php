<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('storage/template/manage/vendor/simple-datatables/style.css')}}">

    @include('layouts.manage.managepartials.managehead')
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
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0 p-1">Ürünler</h2>
                        </div>
                        <div class="col justify-content-end" style="display: flex;">
                            <button class="btn btn-primary"><a href="/manage/products/new" style="color: white">+ Yeni Ürün</a></button>
                        </div>
                    </div>


                </div>
            </header>


            <!-- Dashboard Counts Section-->
            <section class="pb-0">
                <div class="container-fluid">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row gx-5 bg-white">

                                <div class="table-responsive">


                                    <table class="table" id="datatable1" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Resim</th>
                                            <th>Ürün Adı</th>
                                            <th>Fiyat</th>
                                            <th>İndirimli Fiyat</th>
                                            <th>Stok</th>
                                            <th>Durum</th>
                                            <th style="text-align: right">İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($products as $product)

                                            <tr class="manageproductable">
                                                <td><img src="{{asset('storage')}}/{{$product->image}}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: fill" alt=""></td>
                                                <td><a href="{{route('manageproductsedit', $product->id)}}" class="text-muted">{{$product->title}}</a></td>
                                                <td>{{$product->price}}₺</td>
                                                <td>@if ($product->sale_price == null) - @else
                                                    {{$product->sale_price}}₺ @endif </td>
                                                <td>50</td>
                                                <td style="align-items: center; ">
                                                    @if($product->statu == 1)
                                                       <div class="" style="background-color: #1eaa7c; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                        <span>Satışta</span>
                                                    @else
                                                        <div class="" style="background-color: dimgrey; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                        <span>Pasif</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: right">
                                                    <span><a href="{{route('manageproductsedit', $product->id)}}" style="color: #0b0b0b">Düzenle</a></span>
                                                    <span style="margin-left: 10px"></span>
                                                    <button type="button" class="btn btn-custom" >Sil</button>
                                                </td>
                                            </tr>


                                        @endforeach

                                        </tbody>
                                    </table>


                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <!-- Dashboard Content Section    -->
            <section class="pb-0">
                <div class="container-fluid">
                    <div class="row align-items-stretch">


                    </div>
                </div>
            </section>



            <!-- Page Footer-->
            <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs" id="footer">
                <div class="container-fluid">
                    <div class="row gy-2">
                        <div class="col-sm-6 text-sm-start">
                            <p class="mb-0">Your company &copy; 2017-2022</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <p class="mb-0">Version 2.1.0</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</div>



@include('layouts.manage.managepartials.managefooter')

</body>

<script>
    document.getElementById('managenavbar').children.item(1).classList.add('active');
</script>


</html>
