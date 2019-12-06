$('#vendorForm').on('submit', function(e) {
    e.preventDefault();
    const vendorDetails = {
        fname: $('#fname').val(),
        mname: $('#mname').val(),
        lname: $('#lname').val(),
        contactNumber: $('#contactNumber').val(),
        emailId: $('#emailId').val(),
        contactAddress: $('#contactAddress').val(),
        pincode: $('#pincode').val(),
        landline: $('#landline').val(),
        birthDate: moment($('#dropper-max-year').val()).format('YYYY-MM-DD')
    };
    var returnVal = $("#vendorForm").valid();
    if (returnVal) {
        $.ajax({
            url: url + 'addVendor.php',
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