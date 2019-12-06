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
    // Get base64 value from <img id='imageprev'> source
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
                    productList.set(response.Data.productId, response.Data);
                    showProducts(productList);
                    goback();
                } else {
                    alert(response.Message);
                }
            }
        });
    }
});