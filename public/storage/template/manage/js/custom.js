$(document).ready(function () {

    $('#new-product-save').on('click', function (e) {
        e.preventDefault();

        var product_title = document.getElementById('product-title').value;
        var product_type = document.getElementById('product-type').value;
        var product_price = document.getElementById('product-price').value;
        var product_sale_price = document.getElementById('product-sale-price').value;

        var variations = document.getElementById('product-variation').selectedOptions;
        var product_variation = Array.from(variations).map(({ value }) => value);

        var editor = quill.root.innerHTML;

        var categories = document.getElementById('product-category').selectedOptions;
        var product_category = Array.from(categories).map(({ value }) => value);

        var tags = document.getElementById('product-tag').selectedOptions;
        var product_tag = Array.from(tags).map(({ value }) => value);

        var product_brand = document.getElementById('product-brand').value;
        var product_slug = document.getElementById('product-slug').value;
        var product_keyword = document.getElementById('product-keyword').value;
        // var texteditor = document.getElementById('editor').text();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/create",
            method: 'POST',
            data: {
                product_title: product_title,
                product_type : product_type,
                product_price : product_price,
                product_sale_price : product_sale_price,
                variations : product_variation,
                editor : editor,
                product_category : product_category,
                product_tag : product_tag,
                product_brand : product_brand,
                product_slug : product_slug,
                product_keyword : product_keyword,
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Ürün oluşturuldu.', product_title, {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                    // Redirect
                    onHidden: function() {
                        window.location.href = '/manage/products/edit/'+response;
                    }
                });
            },
            error: function(response) {
                toastr.error('Ürün oluşturulurken hata.', product_title);
            }
        });

        document.getElementById('add_file').click();


    });

    $('#new-product-edit-save').on('click', function (e) {
        e.preventDefault();

        var product_title = document.getElementById('product-title').value;
        var product_type = document.getElementById('product-type').value;
        var product_price = document.getElementById('product-price').value;
        var product_sale_price = document.getElementById('product-sale-price').value;

        var variations = document.getElementById('product-variation').selectedOptions;
        var product_variation = Array.from(variations).map(({ value }) => value);

        var editor = quill.root.innerHTML;

        var categories = document.getElementById('product-category').selectedOptions;
        var product_category = Array.from(categories).map(({ value }) => value);

        var tags = document.getElementById('product-tag').selectedOptions;
        var product_tag = Array.from(tags).map(({ value }) => value);

        var product_brand = document.getElementById('product-brand').value;
        var product_slug = document.getElementById('product-slug').value;
        var product_keyword = document.getElementById('product-keyword').value;

        var product_id = document.getElementById('new-product-edit-save').value;
        // var texteditor = document.getElementById('editor').text();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/edit/"+product_id,
            method: 'POST',
            data: {
                product_title: product_title,
                product_type : product_type,
                product_price : product_price,
                product_sale_price : product_sale_price,
                variations : product_variation,
                editor : editor,
                product_category : product_category,
                product_tag : product_tag,
                product_brand : product_brand,
                product_slug : product_slug,
                product_id : product_id,
                product_keyword : product_keyword,
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Ürün güncellendi.', product_title, {
                    timeOut: 1000,
                    closeButton: true
                })
            },
            error: function(response) {
                alert("eroorrrr");
            }
        });

        //document.getElementById('add_file').click();


    });

    $('#new-product-delete').on('click', function (e) {
        e.preventDefault();

        var product_id = document.getElementById('new-product-delete').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/delete/"+product_id,
            method: 'POST',
            data: {
                product_id : product_id
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Ürün silindi.', product_title, {
                    timeOut: 1000,
                    closeButton: true
                })
            },
            error: function(response) {
                alert("eroorrrr");
            }
        });

        //document.getElementById('add_file').click();


    });

    $('#new-category-save').on('click', function (e) {
        e.preventDefault();

        var category_title = document.getElementById('category-title').value;
        var category_statu = document.getElementById('category-statu').value;
        var main_category = document.getElementById('main-category').value;
        var category_slug = document.getElementById('category-slug').value;
        //var editor = quill.root.innerHTML;
        var category_id = document.getElementById('new-category-save').value;
        // var texteditor = document.getElementById('editor').text();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/categories/create",
            method: 'POST',
            data: {
                category_title: category_title,
                category_statu : category_statu,
                main_category : main_category,
                category_slug : category_slug,
                //editor : editor,
                category_id : category_id
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Kategori oluşturuldu.', category_title, {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                    // Redirect
                    onHidden: function() {
                        window.location.href = '/manage/categories/edit/'+response;
                    }
                });
            },
            error: function(response) {
                toastr.error('Kategori oluşturulurken hata.', category_title);
            }
        });

    });

    $('#new-category-edit-save').on('click', function (e) {
        e.preventDefault();

        var category_title = document.getElementById('category-title').value;
        var category_statu = document.getElementById('category-statu').value;
        var main_category = document.getElementById('main-category').value;
        var category_slug = document.getElementById('category-slug').value;
        //var editor = quill.root.innerHTML;
        var category_id = document.getElementById('new-category-edit-save').value;
        // var texteditor = document.getElementById('editor').text();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/categories/edit/"+category_id,
            method: 'POST',
            data: {
                category_title: category_title,
                category_statu : category_statu,
                main_category : main_category,
                category_slug : category_slug,
                //editor : editor,
                category_id : category_id
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Kategori güncellendi.', category_title, {
                    timeOut: 1000,
                    closeButton: true
                })
            },
            error: function(response) {
                toastr.error('Kategori güncellenirken hata.', category_title, {
                    timeOut: 1000,
                    closeButton: true
                })
            }
        });

        //document.getElementById('add_file').click();


    });

    $('#category-delete').on('click', function (e) {
        e.preventDefault();

        var category_id = document.getElementById('category-delete').value;


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/categories/delete/"+category_id,
            method: 'POST',
            data: {
                category_id : category_id
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success(response, {
                    timeOut: 1000,
                    closeButton: true
                });
                window.location.href = '/manage/categories/';

            },
            error: function(response) {
                toastr.error(response, {
                    timeOut: 1000,
                    closeButton: true
                })
            }
        });


    })

    $('#new-option-save').on('click', function (e) {
        e.preventDefault();

        var option_title = document.getElementById('option-title').value;
        var variation_id = document.getElementById('new-option-save').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/options/create",
            method: 'POST',
            data: {
                option_title: option_title,
                variation_id : variation_id
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success(option_title+' eklendi.', response, {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
                location.reload();
            },
            error: function(response) {
                toastr.error('Seçenek oluşturulurken hata.', response);
            }
        });

    });

    $('#new-variant-save').on('click', function (e) {
        e.preventDefault();

        var variant_title = document.getElementById('variant-title').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/variations/create",
            method: 'POST',
            data: {
                variant_title: variant_title
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success(variant_title+' eklendi.', "Varyant", {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
                window.location.href = '/manage/variations/edit/'+response
            },
            error: function(response) {
                toastr.error('Varyant oluşturulurken hata.', variant_title);
            }
        });

    });

    $('#variation-delete').on('click', function (e) {
        e.preventDefault();

        var variant_id = document.getElementById('variation-delete').value;

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

    });


});
