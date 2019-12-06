const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
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
        tblData += '<tr><td>' + vendors.contactNumber + '</td>';
        tblData += '<td>' + vendors.fname + ' ' + vendors.lname + '</td>';
        tblData += '<td>' + vendors.emailId + '</td>';
        tblData += '<td>' + vendors.birthDate + '</td>';
        tblData += '<td>' + vendors.contactAddress + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editVendor(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removeVendor(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.vendorData').html(tblData);
    $('#vendors').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5] }],
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
        $('.vendorlist').hide();
        $('#newvendor').load('add_vendor.php');
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