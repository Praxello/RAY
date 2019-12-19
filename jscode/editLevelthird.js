levelThirdC(levelsecond);

function levelThirdC(levelsecond) {
    var dropdownList = '';
    for (let k of levelsecond.keys()) {
        let category = levelsecond.get(k);
        dropdownList += "<option value='" + (k) + "'>" + category.mtitle + "</option>";
    }
    $('#elevelthirdparent').html(dropdownList);
}
var etloadFile3 = function(event) {
    var output = document.getElementById('etoutput3');
    output.src = URL.createObjectURL(event.target.files[0]);
};
$(document).on("submit", "#elevelthirdData", function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('reportId', reportId_levelthird);
    $.ajax({
        url: url + 'editLevelthird.php',
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
                levelthird.set(response.Data.reportId, response.Data);
                $('#elevelthirdData')[0].reset();
                $('#ethirdmodal').modal('toggle');
                showLevelsdata(levelthird, 3);

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