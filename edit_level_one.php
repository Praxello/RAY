<div class="modal fade" id="editdemoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Update level one data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form class="forms-sample" id="editLeveloneData" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="etype" value="1"/>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="productTitle">Title</label>
                                <input type="text" id="edittitle" name="edittitle" class="form-control" placeholder="Enter Title" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="productCategory">Category</label>
                                <select class="form-control select2" id="eparentIdlevelone" name="eparentIdlevelone" placeholder="Category" required>
                                   
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="productDesc">Brand Image</label>
                                <input type="file" name="eimgname" id="eimgname" class="form-control" accept="image/*" onchange="editLeveloneloadFile(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                            
                        </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="output">Image view</label>
                            <img src="" alt="" id="editleveloneoutput" width="100px" height="100px">
                        </div>
                    </div>
                    <div class="col-md-4">
                            
                            </div>
                    </div>
               

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="jscode/editLevelone.js"></script>