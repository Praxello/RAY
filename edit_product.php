<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Update Product Details</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="productform" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productTitle">Product Title</label>
                            <input type="text" id="productTitle" class="form-control" placeholder="Product Title">
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
                            <label for="gst">GST No.</label>
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
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Add upto 3 product images</h3></div>
        <div class="card-body">
            <form action="apis/upload.php" class="dropzone" id="myAwesomeDropzone">
                <input type="hidden" id="productId" name="productId" />
            </form>
        </div>
    </div>
</div>
<script>
    Dropzone.autoDiscover = false;
    $(".dropzone").dropzone({
        init: function() {
            thisDropzone = this;
            var link = url + 'getImages.php';
            $.get('apis/getImages.php', {
                productId: uproductId
            }, function(response) {
                $.each(response.Data, function(key, value) {

                    var mockFile = {
                        name: value.name,
                        size: value.size
                    };

                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);

                    thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "apis/upload/" + value.name);

                });

            });
        },
        addRemoveLinks: true,
        removedfile: function(file) {
            var name = file.name;
            $.ajax({
                type: 'POST',
                url: url + 'upload.php',
                data: {
                    name: name,
                    request: 2,
                    productId: uproductId
                },
                sucess: function(data) {
                    console.log('success: ' + data);
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        }
    });

    function vendorList(vendorsList) {
        dropdownList = '';
        for (let k of vendorsList.keys()) {
            let vendors = vendorsList.get(k);
            dropdownList += '<option value=' + (k) + '>' + vendors.fname + ' ' + vendors.lname + '</option>';
        }
        $('#vendorId').html(dropdownList);
    }
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
</script>