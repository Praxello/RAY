loadlevelthirdCategory(levelsecond);
var reportId_levelthird = null;
var tdir = 'Levels/levelthird/';

function loadlevelthirdCategory(levelsecond) {
    var dropdownList = '';
    for (let k of levelsecond.keys()) {
        let category = levelsecond.get(k);
        dropdownList += "<option value='" + (k) + "'>" + category.mtitle + "</option>";
    }
    $('#levelthirdparent').html(dropdownList);
}
var loadFile3 = function(event) {
    var output = document.getElementById('output3');
    output.src = URL.createObjectURL(event.target.files[0]);
};

function editlevelthirddata(reportId) {
    var reportId = reportId.toString();
    var reports = levelthird.get(reportId);
    reportId_levelthird = reportId;
    console.log(reports);
    $('#etitle').val(reports.mtitle);
    $('#elevelthirdparent').val(reports.sreportId).trigger('change');
    var src = tdir + reportId + ".jpg";
    console.log(src);
    $('#etoutput3').attr("src", src);
    $('#ethirdmodal').modal('toggle');
}
$('#levelthirdData').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: url + 'addLevelthird.php',
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
                levelthird.set(response.Data.reportId, response.Data);
                $('#thirdmodal').modal('toggle');
                showLevelsdata(levelthird, 3);
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