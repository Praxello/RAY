vendorList(vendorsList);

function loadDetails(product) {
    $('#productId').val(product.productId);
    $('#productTitle').val(product.productTitle);
    $('#productCategory').val(product.category);
    $('#vendorId').val(product.userId).trigger('change');
    $('#price').val(product.price);
    $('#gst').val(product.GST);
    $('#videoLink').val(product.videoUrl);
    $('#productDesc').val(product.details);
}
loadDetails(details);

$('#productform').on('submit', function(e) {
    e.preventDefault();
    const productDetails = {
        productId: uproductId,
        productTitle: $('#productTitle').val(),
        category: $('#productCategory').val(),
        userId: $('#vendorId').val(),
        price: $('#price').val(),
        GST: $('#gst').val(),
        videoUrl: $('#videoLink').val(),
        details: $('#productDesc').val()
    };
    $.ajax({
        url: url + 'editProduct.php',
        type: 'POST',
        data: productDetails,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                alert(response.Message);
                productList.set(response.Data.productId, response.Data);
                showProducts(productList);
                goback();
            } else {
                alert(response.Message);
            }
        }
    });
});