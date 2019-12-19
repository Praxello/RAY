eloadleveloneCategory(categoryList);

function eloadleveloneCategory(categoryList) {
    var dropdownList = '';
    for (let k of categoryList.keys()) {
        let category = categoryList.get(k);
        dropdownList += "<option value='" + (k) + "'>" + category.title + "</option>";
    }
    $('#eparentIdlevelone').html(dropdownList);
}
var editLeveloneloadFile = function(event) {
    var output = document.getElementById('editleveloneoutput');
    output.src = URL.createObjectURL(event.target.files[0]);
};
$(document).on("submit", "#editLeveloneData", function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('reportId', reportId_levelone);
    $.ajax({
        url: url + 'editLevelone.php',
        type: 'POST',
        data: formData,
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
                levelone.set(response.Data.reportId, response.Data);
                $('#editLeveloneData')[0].reset();
                $('#editdemoModal').modal('toggle');
                showLevelsdata(levelone, 1);
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