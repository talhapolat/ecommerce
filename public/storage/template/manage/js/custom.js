$(document).ready(function () {

    $('#new-product-save').on('click', function (e) {
        e.preventDefault();

        var product_title = document.getElementById('product-title').value;
        var product_type = document.getElementById('product-type').value;
        var product_price = parseFloat(document.getElementById('product-price').value);
        var product_sale_price = parseFloat(document.getElementById('product-sale-price').value);

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

        if (product_title === ''){
            toastr.error('Ürün başlığı giriniz.');
            return 'false';
        } else if(product_price === ''){
            toastr.error('Fiyat giriniz.');
            return 'false';
        } else if(product_slug === ''){
            toastr.error('Slug giriniz.');
            return 'false';
        } else if(product_sale_price >= product_price){
            toastr.error('İndirimli fiyat asıl fiyattan küçük olmalıdır.');
            return 'false';
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/create",
            method: 'GET',
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

                if (response === 'slugerror'){
                    toastr.error('Bu slug başka üründe kullanılmış. Benzersiz olmalıdır.', product_slug);
                }else{
                toastr.success('Ürün oluşturuldu.', product_title, {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                    // Redirect
                    onHidden: function() {
                        window.location.href = '/manage/products/edit/'+response;
                    }
                });
                document.getElementById('add_file').click();
            }
            },
            error: function(response) {
                toastr.error('Ürün oluşturulurken hata.', product_title);
            }
        });




    });

    $('#new-product-edit-save').on('click', function (e) {
        e.preventDefault();

        var product_title = document.getElementById('product-title').value;
        var product_type = document.getElementById('product-type').value;
        var product_price = parseFloat(document.getElementById('product-price').value);
        var product_sale_price = parseFloat(document.getElementById('product-sale-price').value);
        var product_stock = document.getElementById('product_stock').value;

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

        var h = [];
        $("ul.nav li").each(function() {  h.push($(this).attr('id').substr(9));  });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/products/edit/save/"+product_id,
            method: 'POST',
            data: {
                product_title: product_title,
                product_type : product_type,
                product_price : product_price,
                product_sale_price : product_sale_price,
                product_stock : product_stock,
                variations : product_variation,
                editor : editor,
                product_category : product_category,
                product_tag : product_tag,
                product_brand : product_brand,
                product_slug : product_slug,
                product_id : product_id,
                product_keyword : product_keyword,
                image_order : h
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Ürün güncellendi.', product_title, {
                    timeOut: 1000,
                    closeButton: true
                })
                if (response === true) {
                    window.location.href = '/manage/products/edit/'+product_id;
                }

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
                toastr.success('Ürün silindi.', response, {
                    timeOut: 1000,
                    closeButton: true
                });
                location.reload();
            },
            error: function(response) {
                alert("hata");
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

    $('#new-variation-edit-save').on('click', function (e) {

        var variant_id = document.getElementById('new-variation-edit-save').value;
        var variation_title = document.getElementById('variation-title').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/variations/update",
            method: 'POST',
            data: {
                variant_id: variant_id,
                variation_title: variation_title
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Varyant güncellendi.',response, {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
                window.location.href = '/manage/variations/edit/'+variant_id
            },
            error: function(response) {
                toastr.error('Varyant güncelllenirken hata.', response);
            }
        });

    });


    $('#payment-edit-save').on('click', function (e) {

        var payment_id = document.getElementById('payment-edit-save').value;
        var title = document.getElementById('title').value;
        var payment_statu = document.getElementById('payment-statu').value;
        var commission = document.getElementById('commission').value;
        var price = document.getElementById('price').value;
        if (document.getElementById('merchant-id') != null)
        var merchant_id = document.getElementById('merchant-id').value;
        else
            merchant_id = null;
        if (document.getElementById('merchant-key') != null)
        var merchant_key = document.getElementById('merchant-key').value;
        else
            merchant_key = null;
        if (document.getElementById('merchant-salt') != null)
        var merchant_salt = document.getElementById('merchant-salt').value;
        else
            merchant_salt = null;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/payment/update",
            method: 'POST',
            data: {
                payment_id: payment_id,
                title: title,
                payment_statu: payment_statu,
                commission: commission,
                price: price,
                merchant_id: merchant_id,
                merchant_key: merchant_key,
                merchant_salt: merchant_salt
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Ödeme yöntemi güncellendi.',response, {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
                window.location.href = '/manage/payment/edit/'+payment_id
            },
            error: function(response) {
                toastr.error('Ödeme yöntemi güncelllenirken hata.', response);
            }
        });

    });



    $('#settings-update').on('click', function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/settings/update",
            method: 'POST',
            data: {
                store_title: document.getElementById('store-title').value,
                store_statu: document.getElementById('store-statu').value,
                language: document.getElementById('language').value,
                currency: document.getElementById('currency').value,
                phone: document.getElementById('phone').value,
                description: document.getElementById('editor').value,
                address_name: document.getElementById('address-name').value,
                address_surname: document.getElementById('address-surname').value,
                company_title: document.getElementById('company-title').value,
                tax_number: document.getElementById('tax-number').value,
                tax_office: document.getElementById('tax-office').value,
                address_country: document.getElementById('address-country').value,
                address_city: document.getElementById('address-city').value,
                address_district: document.getElementById('address-district').value,
                full_address: document.getElementById('full-address').value,
                postcode: document.getElementById('postcode').value
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Ayarlar güncellendi.', {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
                // window.location.href = '/manage/settings'
            },
            error: function(response) {
                toastr.error('Ayarlar güncelllenirken hata.');
            }
        });

    });


    $('#product_stock_update').on('click', function (e) {

        const prodstock = [];
        var ind = 0;
        while (ind<=100) {
            if (document.getElementById('prodoptionsqty['+ind+']') != null){
                prodstock[ind] = document.getElementById('prodoptionsqty['+ind+']').value;
                ind = ind+2;
            } else
                break;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/manage/product/stock/update",
            method: 'POST',
            data: {
                prodoptionsqty: prodstock,
                product_id: document.getElementById('product_stock_update').value
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                toastr.success('Stok güncellendi.', {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                });
                // window.location.href = '/manage/settings'
            },
            error: function(response) {
                toastr.error('Stok güncelllenirken hata.');
            }
        });

    });





    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") { return; }

        // original length
        var original_len = input_val.length;

        // initial caret position
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(",") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(",");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = "₺" + left_side + "," + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "₺" + input_val;

            // final formatting
            if (blur === "blur") {
                input_val += ",00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
});
