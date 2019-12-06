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
                                <input type="text" class="form-control" id="fname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="exampleInputName2">Middle Name</label>
                                <input type="text" class="form-control" id="mname" placeholder=" Middle Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="exampleInputName3">Last Name</label>
                                <input type="text" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
               

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputMobileno">Mobile No</label>
                            <input type="Mobileno" class="form-control" id="contactNumber" placeholder="Mobile no">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="emailId" placeholder="Email">
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
                            <input type="pincode" class="form-control" id="pincode" placeholder="Pincode">

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
<script src="plugins/datedropper/datedropper.min.js"></script>
<script src="js/form-picker.js"></script>
<script src="plugins/moment/moment.js"></script>
<script>
    function loadDetails(vendor){
        $('#fname').val(vendor.fname);
        $('#mname').val(vendor.mname);
        $('#lname').val(vendor.lname);
        $('#contactNumber').val(vendor.contactNumber);
        $('#emailId').val(vendor.emailId);
        $('#dropper-max-year').val(vendor.birthDate);
        $('#contactAddress').val(vendor.contactAddress);
        $('#pincode').val(vendor.pincode);
        $('#landline').val(vendor.landline);
    }
    loadDetails(details);
$('#vendorForm').on('submit', function(e) {
    e.preventDefault();
    const vendorDetails = {
        userId:userId,
        fname: $('#fname').val(),
        mname: $('#mname').val(),
        lname: $('#lname').val(),
        contactNumber: $('#contactNumber').val(),
        emailId: $('#emailId').val(),
        contactAddress: $('#contactAddress').val(),
        pincode: $('#pincode').val(),
        landline: $('#landline').val(),
        birthDate:moment($('#dropper-max-year').val()).format('YYYY-MM-DD')
    };
    $.ajax({
        url: url + 'editVendor.php',
        type: 'POST',
        data: vendorDetails,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
               alert(response.Message);
                if(vendorsList.has(response.Data.userId)){
                    vendorsList.delete(response.Data.userId);
                }
                vendorsList.set(response.Data.userId, response.Data);
                showVendors(vendorsList);
                goback();
            }else{
                alert(response.Message);
            }
        }
    });
});
</script>