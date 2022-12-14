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
                // product_sale_price : product_sale_price,
                variations : product_variation,
                editor : editor,
                product_category : product_category,
                product_tag : product_tag,
                product_brand : product_brand,
                product_slug : product_slug,
                // product_keyword : product_keyword,
            },

            success:function(response)
            {
                // $(form).trigger("reset");
                alert(response);
            },
            error: function(response) {
                alert("eroorrrr");
            }
        });

        document.getElementById('add_file').click();


    });

});
