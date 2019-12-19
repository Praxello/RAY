loadleveloneCategory(categoryList);
var reportId_levelone = null;
var dir = 'Levels/levelone/';

function loadleveloneCategory(categoryList) {
    var dropdownList = '';
    for (let k of categoryList.keys()) {
        let category = categoryList.get(k);
        dropdownList += "<option value='" + (k) + "'>" + category.title + "</option>";
    }
    $('#parentIdlevelone').html(dropdownList);
}

function editlevelonedata(reportId) {
    var reportId = reportId.toString();
    var reports = levelone.get(reportId);
    reportId_levelone = reportId;
    console.log(reports);
    $('#edittitle').val(reports.mtitle);
    $('#eparentIdlevelone').val(reports.sreportId).trigger('change');
    var src = dir + reportId + ".jpg";
    console.log(src);
    $('#editleveloneoutput').attr("src", src);
    $('#editdemoModal').modal('toggle');
}
$(document).on("submit", "#leveloneData", function(e) {
    e.preventDefault();
    $.ajax({
        url: url + 'addLevelone.php',
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
                levelone.set(response.Data.reportId, response.Data);
                $('#leveloneData')[0].reset();
                $('#demoModal').modal('toggle');
                showLevelsdata(levelone, 1);
                loadlevelsecondCategory(levelone);
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