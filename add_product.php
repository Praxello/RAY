<style>
.error{
    color: red;
}
</style>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Add New Product</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="productform" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productTitle">Product Title</label>
                            <input type="text" id="productTitle" name="productTitle" class="form-control"  placeholder="Product Title">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productCategory">Category</label>
                            <select  class="form-control select2" id="productCategory" name="category" placeholder="Category">
                                <option value="0">Small scale</option>
                                <option value="1">Large scale</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="vendorId">Vendor</label>
                            <select class="form-control" id="vendorId" name="userId">
                              
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gst">HSN No</label>
                            <input type="text" class="form-control" id="gst"  name="GST" placeholder="HSN number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="videoLink">Video URL</label>
                            <input type="url" class="form-control" id="videoLink" name="videoUrl" placeholder="Link">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Textarea</label>
                            <textarea class="form-control" id="productDesc" name="details" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Brand Image</label>
                            <input type="file" name="imgname" id="imgname" class="form-control" accept="image/*" onchange="loadFile(event)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="output">Brand Image view</label>
                            <img src="" alt="" id="output" width="110px" height="110px">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.validate.js"></script>
<script src="jscode/loadFile.js"></script>
<script src="jscode/vendorList.js"></script>
<script src="jscode/product_validation.js"></script>
<script src="jscode/addproduct.js"> </script>
