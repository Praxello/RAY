const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
if (data.roleId != 1) {
    $('.vendorButton').hide();
}
var userId = null; //for updation
var details = {};
var vendorsList = new Map();
const loadVendors = () => {
    $.ajax({
        url: url + 'getAllVendors.php',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    vendorsList.set(response.Data[i].userId, response.Data[i]);
                }
                showVendors(vendorsList);
            }
        }
    });
}

const showVendors = vendorsList => {
    $('#vendors').dataTable().fnDestroy();
    $('.vendorData').empty();
    var tblData = '';
    for (let k of vendorsList.keys()) {
        let vendors = vendorsList.get(k);
        var activeLable = '<td><label class="badge badge-danger">inactive</label></td>';
        if (vendors.isActive == 1) {
            activeLable = '<td><label class="badge badge-success">active</label></td>';
        }
        var bdate = moment(vendors.birthDate).format("dddd, MMMM Do YYYY");
        tblData += '<tr><td>' + vendors.contactNumber + '</td>';
        tblData += '<td>' + vendors.fname + ' ' + vendors.lname + '</td>';
        tblData += '<td>' + vendors.emailId + '</td>';
        tblData += '<td>' + bdate + '</td>';
        tblData += '<td>' + vendors.contactAddress + '</td>';
        tblData += activeLable;
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editVendor(' + (k) + ')" title="Edit vendor details"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removeVendor(' + (k) + ')" title="Activate/Inactivate vendor"><i class="ik ik-check-circle"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.vendorData').html(tblData);
    $('#vendors').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}
loadVendors();

const editVendor = vendorId => {
    vendorId = vendorId.toString();
    if (vendorsList.has(vendorId)) {
        $('.vendorlist').hide();
        $('#newvendor').load('edit_vendor.php');
        const vendor = vendorsList.get(vendorId);
        userId = vendorId;
        details = vendor;
    } else {
        alert('something goes wrong');
    }
}


const removeVendor = vendorId => {
    vendorId = vendorId.toString();
    if (vendorsList.has(vendorId)) {
        var vendor = vendorsList.get(vendorId);
        var listDelete = $('.list-delete');
        swal({
                title: "Are you sure?",
                text: "Do you really want to Activate ?",
                icon: "warning",
                buttons: ["Cancel", "Activate Now"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url + 'deleteVendor.php',
                        type: 'POST',
                        data: { vendorId: vendorId },
                        dataType: 'json',
                        success: function(response) {
                            if (response.Responsecode == 200) {
                                if (vendor.isActive == '0') {
                                    vendor.isActive = '1';
                                } else {
                                    vendor.isActive = '0';
                                }
                                vendorsList.set(vendorId, vendor);
                                showVendors(vendorsList);
                                swal({
                                    title: "Activated",
                                    text: response.Message,
                                    icon: "success",
                                });
                            }
                        }
                    });
                } else {
                    swal("The vendor is not activated!");
                }
            });
    }
}

function addVendor() {
    $('.vendorlist').hide();
    $('#newvendor').load('add_vendor.php');
}

function goback() {
    $('#newvendor').empty();
    $('.vendorlist').show();
}