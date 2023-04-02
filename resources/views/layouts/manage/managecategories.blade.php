<!DOCTYPE html>
<html>
<head>
    @include('layouts.manage.managepartials.managehead')
    <link rel="stylesheet" href="{{asset('storage/template/manage/vendor/simple-datatables/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <h2 class="mb-0 p-1">Kategoriler</h2>
                        </div>
                        <div class="col justify-content-end" style="display: flex;">
                            <button class="btn btn-primary"><a href="/manage/categories/new" style="color: white">+ Yeni Kategori</a></button>
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

                                    <table class="table" id="datatablecategory" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Üst Kategori</th>
                                            <th>Açıklama</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($maincategories as $maincategory)

                                            <tr class="manageproductable">
                                                <td><a href="{{route('managecategoriesedit', $maincategory->id)}}" class="text-muted">{{$maincategory->name}}</a></td>
                                                <td>{{$maincategory->main_category_id}}</td>
                                                <td>{{$maincategory->description}}</td>
                                                <td style="align-items: center; ">
                                                    @if($maincategory->statu == 1)
                                                        <div class="" style="background-color: #1eaa7c; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                        <span>Aktif</span>
                                                    @else
                                                        <div class="" style="background-color: dimgrey; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                        <span>Pasif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span><a href="{{route('managecategoriesedit', $maincategory->id)}}" style="color: #0b0b0b">Düzenle</a></span>
                                                    <span style="margin-left: 10px"></span>
                                                    <button type="button" id="category-delete" value="{{$maincategory->id}}" class="btn btn-outline-danger">Sil</button>
                                                </td>
                                            </tr>

                                            @foreach($categories as $category)
                                                @if($category->main_category_id == $maincategory->id)
                                                    <tr class="manageproductable">
                                                        <td>
                                                            <i>-</i>
                                                            <a href="{{route('managecategoriesedit', $category->id)}}" class="text-muted" style="padding-left: 0px">{{$category->name}}</a>
                                                        </td>
                                                        <td>{{$maincategory->name}}</td>
                                                        <td>{{$category->description}}</td>
                                                        <td style="align-items: center; ">
                                                            @if($category->statu == 1)
                                                                <div class="" style="background-color: #1eaa7c; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                                <span>Aktif</span>
                                                            @else
                                                                <div class="" style="background-color: dimgrey; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                                <span>Pasif</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span><a href="{{route('managecategoriesedit', $category->id)}}" style="color: #0b0b0b">Düzenle</a></span>
                                                            <span style="margin-left: 10px"></span>
                                                            <button type="button" id="category-delete" value="24" class="btn btn-outline-danger">Sil</button>
                                                        </td>
                                                    </tr>

                                                    @foreach($categories as $subcategory)

                                                        @if($subcategory->main_category_id == $category->id)
                                                            <tr class="manageproductable">
                                                                <td>
                                                                    <i>- -</i>
                                                                    <a href="{{route('managecategoriesedit', $subcategory->id)}}" class="text-muted" style="padding-left: 0px">{{$subcategory->name}}</a>
                                                                </td>
                                                                <td>{{$maincategory->name}} / {{$category->name}}</td>
                                                                <td>{{$subcategory->description}}</td>
                                                                <td style="align-items: center; ">
                                                                    @if($subcategory->statu == 1)
                                                                        <div class="" style="background-color: #1eaa7c; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                                        <span>Aktif</span>
                                                                    @else
                                                                        <div class="" style="background-color: dimgrey; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                                        <span>Pasif</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span><a href="{{route('managecategoriesedit', $subcategory->id)}}" style="color: #0b0b0b">Düzenle</a></span>
                                                                    <span style="margin-left: 10px"></span>
                                                                    <button type="button" id="category-delete" value="{{$subcategory->id}}" class="btn btn-outline-danger">Sil</button>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                    @endforeach
                                                    @endif
                                            @endforeach

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

<script>
    document.getElementById('managenavbar').children.item(2).classList.add('active');
</script>
</body>

</html>
