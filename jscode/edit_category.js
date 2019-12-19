$('#ecategoryform').on('submit', function(e) {
    e.preventDefault();
    var formdata = new FormData(this);
    formdata.append('reportId', ucategoryId);
    $.ajax({
        url: url + 'editCategory.php',
        type: 'POST',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
                categoryList.set(response.Data.reportId, response.Data);
                $('#ecategoryModal').modal('toggle');
                $('#ecategoryform')[0].reset();
                showCategories(categoryList);
            } else {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.Message,
                    button: false,
                    timer: 1500
                });
            }
        }
    });
});