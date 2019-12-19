loadlevelsecondCategory(levelone);
var reportId_levelsecond = null;
var sdir = 'Levels/levelsecond/';

function loadlevelsecondCategory(levelone) {
    var dropdownList = '';
    for (let k of levelone.keys()) {
        let category = levelone.get(k);
        dropdownList += "<option value='" + (k) + "'>" + category.mtitle + "</option>";
    }
    $('#secondLevel').html(dropdownList);
}
var loadFile2 = function(event) {
    var output = document.getElementById('output2');
    output.src = URL.createObjectURL(event.target.files[0]);
};

function editlevelseconddata(reportId) {
    var reportId = reportId.toString();
    var reports = levelsecond.get(reportId);
    reportId_levelsecond = reportId;
    console.log(reports);
    $('#estitle').val(reports.mtitle);
    $('#essecondLevel').val(reports.sreportId).trigger('change');
    var src = sdir + reportId + ".jpg";
    console.log(src);
    $('#esoutput').attr("src", src);
    $('#esecondmodal').modal('toggle');
}
$('#levelsecondData').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: url + 'addLevelsecond.php',
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
                    showConfirmButton: false,
                    timer: 1500
                });
                levelsecond.set(response.Data.reportId, response.Data);
                $('#secondmodal').modal('toggle');
                showLevelsdata(levelsecond, 2);
            } else {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.Message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
});