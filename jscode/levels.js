var categoryList = new Map();
var levelone = new Map();
var levelsecond = new Map();
var levelthird = new Map();
const Level_one = () => {
    $.ajax({
        url: url + 'getLevelone.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    levelone.set(response.Data[i].reportId, response.Data[i]);
                }
                showLevelsdata(levelone, 1);
            }
        }
    });
};
const Level_second = () => {
    $.ajax({
        url: url + 'getLevelsecond.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    levelsecond.set(response.Data[i].reportId, response.Data[i]);
                }
                showLevelsdata(levelsecond, 2);
            }
        }
    });
};
const Level_third = () => {
    $.ajax({
        url: url + 'getLevelthird.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    levelthird.set(response.Data[i].reportId, response.Data[i]);
                }
                showLevelsdata(levelthird, 3);
            }
        }
    });
};

const loadCategory = () => {
    $.ajax({
        url: url + 'getAllCategory.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    categoryList.set(response.Data[i].reportId, response.Data[i]);
                }
                showCategories(categoryList);

            }
        }
    });
};

const showCategories = categoryList => {
    $('#categories').empty();
    var tblData = '';
    var i = 1;
    for (let k of categoryList.keys()) {
        let category = categoryList.get(k);

        tblData += '<tr><td>' + (i) + '</td>';
        tblData += '<td class="text-center"><a href="#!" onclick="editCategory(' + k + ')">';
        tblData += '<label class="badge badge-success">' + category.title + '</label></a>';
        tblData += '</td></tr>';
        i++;
    }
    $('#categories').html(tblData);
};
const showLevelsdata = (levelsdata, level) => {
    var src = "";
    if (level == 1) {
        $('#levelone').empty();
        src = "Levels/levelone/";
    } else if (level == 2) {
        $('#levelsecond').empty();
        src = "Levels/levelsecond/";
    } else if (level == 3) {
        $('#levelthird').empty();
        src = "Levels/levelthird/";
    }
    var tblData = '';
    var action = '';
    for (let k of levelsdata.keys()) {
        let levels = levelsdata.get(k);
        if (level == '1') {
            action = '<td><a href="#!" onclick="editlevelonedata(' + k + ')"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!" class="list-delete" onclick="removeLevelone(' + (k) + ')"><i class="ik ik-trash-2 f-16 text-red"></i></a></td></tr>';
        } else if (level == '2') {
            action = '<td><a href="#!" onclick="editlevelseconddata(' + k + ')"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!" class="list-delete" onclick="removeLevel2(' + (k) + ')"><i class="ik ik-trash-2 f-16 text-red"></i></a></td></tr>';
        } else if (level == '3') {
            action = '<td><a href="#!" onclick="editlevelthirddata(' + k + ')"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!" class="list-delete" onclick="removeLevel3(' + (k) + ')"><i class="ik ik-trash-2 f-16 text-red"></i></a></td></tr>';
        }
        tblData += '<tr><td>' + levels.mtitle + '</td>';
        tblData += '<td>' + levels.title + '</td>';
        tblData += '<td><img src=' + src + k + '.jpg' + ' alt="No Image" class="img-fluid img-20"></td>';
        tblData += action;
    }
    if (level == 1) {
        $('#levelone').html(tblData);
    } else if (level == 2) {
        $('#levelsecond').html(tblData);
    } else if (level == 3) {
        $('#levelthird').html(tblData);
    }
};
loadCategory();
Level_one();
Level_second();
Level_third();

const removeLevelone = reportId => {
    reportId = reportId.toString();
    if (levelone.has(reportId)) {
        var listDelete = $('.list-delete');

        swal({
                title: "Are you sure?",
                text: "Do you really want to remove then next level data is also deleted?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url + 'removeLevelone.php',
                        type: 'POST',
                        data: { reportId: reportId, table: 'reports_level1' },
                        dataType: 'json',
                        success: function(response) {
                            if (response.Responsecode == 200) {
                                levelone.delete(reportId);
                                showLevelsdata(levelone, 1);
                                swal({
                                    title: "Deleted",
                                    text: response.Message,
                                    icon: "success",
                                });
                            }
                        }
                    });
                } else {
                    swal({
                        title: "Safe",
                        text: "Data Not removed",
                        icon: "warning",
                    });
                }
            });
    }
};
const removeLevel2 = reportId => {
    reportId = reportId.toString();
    if (levelsecond.has(reportId)) {
        var listDelete = $('.list-delete');

        swal({
                title: "Are you sure?",
                text: "Do you really want to remove then next level data is also deleted?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url + 'removeLevelone.php',
                        type: 'POST',
                        data: { reportId: reportId, table: 'reports_level2' },
                        dataType: 'json',
                        success: function(response) {
                            if (response.Responsecode == 200) {
                                levelsecond.delete(reportId);
                                showLevelsdata(levelsecond, 2);
                                swal({
                                    title: "Deleted",
                                    text: response.Message,
                                    icon: "success",
                                });
                            }
                        }
                    });
                } else {
                    swal({
                        title: "Safe",
                        text: "Data Not removed",
                        icon: "warning",
                    });
                }
            });
    }
};
const removeLevel3 = reportId => {
    reportId = reportId.toString();
    if (levelthird.has(reportId)) {
        var listDelete = $('.list-delete');

        swal({
                title: "Are you sure?",
                text: "Do you really want to remove then next level data is also deleted?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url + 'removeLevelone.php',
                        type: 'POST',
                        data: { reportId: reportId, table: 'reports_level3' },
                        dataType: 'json',
                        success: function(response) {
                            if (response.Responsecode == 200) {
                                levelthird.delete(reportId);
                                showLevelsdata(levelthird, 3);
                                swal({
                                    title: "Deleted",
                                    text: response.Message,
                                    icon: "success",
                                });
                            }
                        }
                    });
                } else {
                    swal({
                        title: "Safe",
                        text: "Data Not removed",
                        icon: "warning",
                    });
                }
            });
    }
};