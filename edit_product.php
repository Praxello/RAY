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
                            <label for="gst">HSN No</label>
                            <input type="text" class="form-control" id="gst" placeholder="HSN No">
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
<script src="jscode/dropzoneProduct.js"></script>
<script src="jscode/vendorList.js"></script>
<script src="jscode/editproduct.js"></script>