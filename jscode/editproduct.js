vendorList(vendorsList);

function loadDetails(product) {
    $('#productId').val(product.productId);
    $('#pId').val(product.productId);
    $('#productTitle').val(product.productTitle);
    $('#productCategory').val(product.category);
    $('#vendorId').val(product.userId).trigger('change');
    $('#price').val(product.price);
    $('#gst').val(product.GST);
    $('#videoLink').val(product.videoUrl);
    $('#productDesc').val(product.details);
    var src = url + "upload/" + product.productId + ".jpg";
    console.log(src);
    $('#prevImage').attr("src", src);
    // document.getElementById("prevImage").src = url + "upload/" + product.productId + ".jpg";
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
    var returnVal = $("#productform").valid();
    // Get base64 value from <img id='imageprev'> source
    if (returnVal) {
        $.ajax({
            url: url + 'editProduct.php',
            type: 'POST',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
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
    }
});