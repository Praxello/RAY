const data = {
    userId: 1
};
var userId = null; //for updation
var details = {};
var questionList = new Map();
const loadVendors = () => {
    $.ajax({
        url: url + 'getallquestionanswer.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    questionList.set(response.Data[i].questionId, response.Data[i]);
                }
                showquestion(questionList);
            }
        }
    });
}

const showquestion = questionList => {
    console.log(questionList);
    $('.vendors').dataTable().fnDestroy();
    $('.vendorData').empty();
    var tblData = '';
    for (let k of questionList.keys()) {
        let vendors = questionList.get(k);
        tblData += '<tr><td>' + vendors.question + '</td>';
        // tblData += '<td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>';
        tblData += '<td>' + vendors.categoryname + '</td>';
        tblData += '<td>' + vendors.option1 + '</td>';
        tblData += '<td>' + vendors.option2 + '</td>';
        tblData += '<td>' + vendors.option3 + '</td>';
        tblData += '<td>' + vendors.option4 + '</td>';
        tblData += '<td>' + vendors.correctoption + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editquestion(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removequestion(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.vendorData').html(tblData);
    $('.vendors').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6,7] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}
loadVendors();

const editquestion = vendorId => {
    vendorId = vendorId.toString();
    if (questionList.has(vendorId)) {
        $('.questionlist').hide();
        $('#newquestion').load('edit_vendor.php');
        const vendor = questionList.get(vendorId);
        userId = vendorId;
        details = vendor;
    } else {
        alert('something goes wrong');
    }
}

const removequestion = vendorId => {
    vendorId = vendorId.toString();
    if (questionList.has(vendorId)) {
        $('.questionlist').hide();
        $('#newquestion').load('add_question.php');
    }
}

function addQuestion() {
    $('.questionlist').hide();
    $('#newquestion').load('add_question.php');
}

function goback() {
    $('#newquestion').empty();
    $('.questionlist').show();
}
