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
                            <h2 class="mb-0 p-1">Varyantlar</h2>
                        </div>
                        <div class="col justify-content-end" style="display: flex;">
                            <button class="btn btn-primary"><a href="/manage/categories/new" style="color: white">+ Yeni Varyant</a></button>
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
                                            <th>Varyant Adı</th>
                                            <th>Seçenekler</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($options as $option)

                                            <tr class="manageproductable">
                                                <td><a href="{{route('managevariationsedit', $option->id)}}" class="text-muted">{{$option->title}}</a></td>
                                                <td>
                                            @foreach($suboptions as $suboption)
                                                @if($suboption->option_id == $option->id)
                                                        {{$suboption->title}},
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td style="align-items: center; ">
                                                    @if($option->statu == 1)
                                                        <div class="" style="background-color: #1eaa7c; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                        <span>Aktif</span>
                                                    @else
                                                        <div class="" style="background-color: dimgrey; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                        <span>Pasif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span><a href="{{route('manageoptions', $option->id)}}" style="color: #0b0b0b">Seçenekler</a></span>
                                                    <span style="margin-left: 10px"></span>
                                                    <span><a href="{{route('managevariationsedit', $option->id)}}" style="color: #0b0b0b">Düzenle</a></span>
                                                    <span style="margin-left: 10px"></span>
                                                    <span><a href="#" style="color: #0b0b0b">Sil</a></span>
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
    document.getElementById('managenavbar').children.item(3).classList.add('active');
</script>


</html>
