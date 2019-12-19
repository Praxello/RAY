esloadleveloneCategory(levelone);

function esloadleveloneCategory(levelone) {
    var dropdownList = '';
    for (let k of levelone.keys()) {
        let category = levelone.get(k);
        dropdownList += "<option value='" + (k) + "'>" + category.mtitle + "</option>";
    }
    $('#essecondLevel').html(dropdownList);
}
var esloadFile = function(event) {
    var output = document.getElementById('esoutput');
    output.src = URL.createObjectURL(event.target.files[0]);
};


$(document).on("submit", "#elevelsecondData", function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('reportId', reportId_levelsecond);
    $.ajax({
        url: url + 'editLevelsecond.php',
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
                levelsecond.set(response.Data.reportId, response.Data);
                $('#elevelsecondData')[0].reset();
                $('#esecondmodal').modal('toggle');
                showLevelsdata(levelsecond, 2);
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