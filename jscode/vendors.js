const data = {
    userId: 1
};
var vendorsList = new Map();
const loadVendors = () => {
    $.ajax({
        url: url + 'getAllVendors.php',
        type: 'POST',
        dataType: 'json',
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
    var tblData = '';
    for (let k of vendorsList.keys()) {
        let vendors = vendorsList.get(k);
        tblData += '<tr><td>' + vendors.contactNumber + '</td>';
        tblData += '<td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>';
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
    $('.vendors').dataTable({
        searching: true,
        retrieve: true,
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
    console.log(vendorId);
    vendorId = vendorId.toString();
    if (vendorsList.has(vendorId)) {

    }
}

const removeVendor = vendorId => {
    vendorId = vendorId.toString();
    if (vendorsList.has(vendorId)) {


    }
}