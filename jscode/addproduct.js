vendorList(vendorsList);

$('#productform').on('submit', function(e) {
    e.preventDefault();
    const productDetails = {
        productTitle: $('#productTitle').val(),
        category: $('#productCategory').val(),
        userId: $('#vendorId').val(),
        price: $('#price').val(),
        GST: $('#gst').val(),
        videoUrl: $('#videoLink').val(),
        details: $('#productDesc').val()
    };
    var returnVal = $("#productform").valid();
    if (returnVal) {
        $.ajax({
            url: url + 'addProduct.php',
            type: 'POST',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.Responsecode == 200) {
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: response.Message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    productList.set(response.Data.productId, response.Data);
                    $('#productId').val(response.Data.productId);
                    $('#addProductImages').show();
                    $('.hideit').hide();
                    $('.showit').show();
                } else {
                    swal({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.Message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }
});