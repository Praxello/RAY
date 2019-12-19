<div class="modal fade" id="ecategoryModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-s" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ecdemoModalLabel">Category title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="ecategoryform" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="ecategoryTitle">Category</label>
                                <input type="text" id="ecategoryTitle" name="ecategoryTitle" class="form-control" placeholder="Enter Title" required>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
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
<script src="jscode/edit_category.js"></script>