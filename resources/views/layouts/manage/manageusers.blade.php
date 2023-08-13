<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('storage/template/manage/vendor/simple-datatables/style.css')}}">

    @include('layouts.manage.managepartials.managehead')
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
                            <h2 class="mb-0 p-1">Kullanıcılar</h2>
                        </div>
                        <div class="col justify-content-end" style="display: flex;">
                            <button class="btn btn-primary"><a href="/manage/options/new/"
                                                               data-toggle="modal"
                                                               data-target="#addVariant"
                                                               style="color: white">Kullanıcı Oluştur</a></button>
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
                                            <th>Ad, Soyad</th>
                                            <th>E-posta Adresi</th>
                                            <th>Sipariş Sayısı</th>
                                            <th>Durum</th>
                                            <th>Kayıt Tarihi</th>
                                            <th style="text-align: right">İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($users as $user)

                                            <tr class="manageproductable">
                                                <td><a href="{{route('manageusersedit', $user->id)}}"
                                                       class="text-muted">{{$user->name}} {{$user->surname}}</a></td>
                                                <td>
                                                    {{$user->email}}
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                                <td style="align-items: center; ">
                                                    @if($user->statu == 1)
                                                        <div class=""
                                                             style="background-color: #1eaa7c; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                        <span>Aktif</span>
                                                    @else
                                                        <div class=""
                                                             style="background-color: dimgrey; width: 9px; height: 9px; border-radius: 50%; display: inline-block"></div>
                                                        <span>Pasif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$user->created_at}}
                                                </td>
                                                <td style="text-align: right">

                                                    <span style="margin-left: 10px"></span>
                                                    <span><a href="{{route('manageusersedit', $user->id)}}"
                                                             style="color: #0b0b0b">Düzenle</a></span>
                                                    <span style="margin-left: 10px"></span>
                                                    <button type="button" class="btn btn-custom" onclick="deleteUser({{$user->id}})" value="{{$user->id}}" >Sil</button>
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
            <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs"
                    id="footer">
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


<!-- Modal -->
<div class="modal fade" id="addVariant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Varyant Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>Varyant Adı</h5>
                    <div class="col-12 ">
                        <div class="mb-3 ">
                            <input class="form-control" id="variant-title" type="text" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="new-variant-save">Kaydet</button>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteVariation($variation_id){
        var variant_id = $variation_id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/variations/delete",
            method: 'POST',
            data: {
                variant_id: variant_id
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Varyant silindi.', {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
                window.location.href = '/manage/variations'
            },
            error: function(response) {
                toastr.error('Varyant silinirken hata.');
            }
        });
    };
</script>

<script src="{{asset('storage/template/manage/vendor/simple-datatables/umd/simple-datatables.js')}}"></script>

@include('layouts.manage.managepartials.managefooter')

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>

<script>
    document.getElementById('managenavbar').children.item(6).classList.add('active');
</script>


</html>
