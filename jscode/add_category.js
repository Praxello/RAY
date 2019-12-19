var ucategoryId = null;

function editCategory(categoryId) {
    console.log(categoryId);
    categoryId = categoryId.toString();
    ucategoryId = categoryId;
    var category = categoryList.get(categoryId);
    $('#ecategoryTitle').val(category.title);
    $('#ecategoryModal').modal('toggle');
}
$('#categoryform').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: url + 'addCategory.php',
        type: 'POST',
        data: new FormData(this),
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
                $('#categoryform')[0].reset();
                $('#categoryModal').modal('toggle');
                loadleveloneCategory(categoryList);
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