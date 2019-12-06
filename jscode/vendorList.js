function vendorList(vendorsList) {
    dropdownList = '';
    for (let k of vendorsList.keys()) {
        let vendors = vendorsList.get(k);
        dropdownList += '<option value=' + (k) + '>' + vendors.fname + ' ' + vendors.lname + '</option>';
    }
    $('#vendorId').html(dropdownList);
}