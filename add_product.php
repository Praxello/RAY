<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Product</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="productform" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productTitle">Product Title</label>
                            <input type="text" id="productTitle" class="form-control"  placeholder="Product Title">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productCategory">Category</label>
                            <input type="text" class="form-control" id="productCategory" placeholder="Category">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="vendorId">Vendor</label>
                            <select class="form-control" id="vendorId">
                              
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gst">HSN No</label>
                            <input type="text" class="form-control" id="gst" placeholder="GST no">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="videoLink">Video URL</label>
                            <input type="url" class="form-control" id="videoLink" placeholder="Link">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Textarea</label>
                            <textarea class="form-control" id="productDesc" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script>
function vendorList(vendorsList) {
    dropdownList = '';
    for (let k of vendorsList.keys()) {
        let vendors = vendorsList.get(k);
        dropdownList += '<option value=' + (k) + '>' + vendors.fname + ' ' + vendors.lname + '</option>';
    }
    $('#vendorId').html(dropdownList);
}
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
    $.ajax({
        url: url + 'addProduct.php',
        type: 'POST',
        data: productDetails,
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
});
</script>