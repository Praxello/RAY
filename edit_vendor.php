<style>
.error{
    color: red;
}
</style>
<link rel="stylesheet" href="plugins/datedropper/datedropper.min.css">
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Update Vendor Details</h3></div>

        <div class="card-body">
            <form class="forms-sample" id="vendorForm" method="POST">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputName1">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="exampleInputName2">Middle Name</label>
                                <input type="text" class="form-control" id="mname" name="mname" placeholder=" Middle Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="exampleInputName3">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
               

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputMobileno">Mobile No</label>
                            <input type="Mobileno" class="form-control" id="contactNumber" name="contactNumber" placeholder="Mobile no">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="emailId" name="emailId" placeholder="Email">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleSelectGender">Birth Date</label>
                            <input id="dropper-max-year" class="form-control" type="text" placeholder="Max Year 2020">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleTextarea">Address</label>
                            <textarea class="form-control" id="contactAddress" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleSelectPincode">Pincode</label>
                            <input type="pincode" class="form-control" id="pincode" name="pincode" placeholder="Pincode">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleSelectLandline">Landline No.</label>
                            <input type="Landline" class="form-control" id="landline" placeholder="Landline">

                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary mr-2" value="Submit">
                <button class="btn btn-light" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.validate.js"></script>
<script src="plugins/datedropper/datedropper.min.js"></script>
<script src="js/form-picker.js"></script>
<script src="plugins/moment/moment.js"></script>
<script src="jscode/vendors_validation.js"></script>
<script src="jscode/editvendor.js"></script>