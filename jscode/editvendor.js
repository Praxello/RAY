function loadDetails(vendor) {
    $('#fname').val(vendor.fname);
    $('#mname').val(vendor.mname);
    $('#lname').val(vendor.lname);
    $('#contactNumber').val(vendor.contactNumber);
    $('#emailId').val(vendor.emailId);
    $('#dropper-max-year').val(vendor.birthDate);
    $('#contactAddress').val(vendor.contactAddress);
    $('#pincode').val(vendor.pincode);
    $('#landline').val(vendor.landline);
    $('#password').val(vendor.upassword);
}
loadDetails(details);
$('#vendorForm').on('submit', function(e) {
    e.preventDefault();
    const vendorDetails = {
        userId: userId,
        fname: $('#fname').val(),
        mname: $('#mname').val(),
        lname: $('#lname').val(),
        contactNumber: $('#contactNumber').val(),
        emailId: $('#emailId').val(),
        contactAddress: $('#contactAddress').val(),
        pincode: $('#pincode').val(),
        landline: $('#landline').val(),
        birthDate: moment($('#dropper-max-year').val()).format('YYYY-MM-DD'),
        password: $('#password').val()
    };
    var returnVal = $("#vendorForm").valid();
    if (returnVal) {
        $.ajax({
            url: url + 'editVendor.php',
            type: 'POST',
            data: vendorDetails,
            dataType: 'json',
            success: function(response) {
                if (response.Responsecode == 200) {
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: response.Message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    if (vendorsList.has(response.Data.userId)) {
                        vendorsList.delete(response.Data.userId);
                    }
                    vendorsList.set(response.Data.userId, response.Data);
                    showVendors(vendorsList);
                    goback();
                } else {
                    swal({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.Message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }
});