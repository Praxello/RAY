const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
const loadInquirys = () => {
    $.ajax({
        url: url + 'getAllInquiry.php',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(response) {
            tblData = '';
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    tblData += '<tr><td><img src="' + url + 'upload/' + response.Data[i].productId + '.jpg" class="table-user-thumb" alt="Image"></td>';
                    tblData += '<td>' + response.Data[i].productTitle + '</td>';
                    tblData += '<td>' + response.Data[i].inqDate + '</td>';
                    tblData += '<td>' + response.Data[i].customerId + '</td>';
                    tblData += '<td>' + response.Data[i].isAcknoledge + '</td></tr>';
                }
            }
            $('.inquirydata').html(tblData);
            $('#inquiry').dataTable({
                searching: true,
                retrieve: true,
                bPaginate: $('tbody tr').length > 10,
                order: [],
                columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4] }],
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                destroy: true
            });
        }
    });
}
loadInquirys();