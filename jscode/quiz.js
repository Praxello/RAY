const data = {
    userId: 1
};
var uquestionId = null; //for updation
var details = {};
var questionList = new Map();
const listQuestions = () => {
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
    $('#quiz').dataTable().fnDestroy();
    $('.vendorData').empty();
    var tblData = '';
    for (let k of questionList.keys()) {
        let question = questionList.get(k);
        console.log(question);
        tblData += '<tr><td>' + question.question + '</td>';
        tblData += '<td>' + question.categoryname + '</td>';
        tblData += '<td>' + question.option1 + '</td>';
        tblData += '<td>' + question.option2 + '</td>';
        tblData += '<td>' + question.option3 + '</td>';
        tblData += '<td>' + question.option4 + '</td>';
        tblData += '<td>' + question.correctoption + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editquestion(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removequestion(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.vendorData').html(tblData);
    $('#quiz').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}
listQuestions();

const editquestion = questionId => {
    questionId = questionId.toString();
    if (questionList.has(questionId)) {
        $('.questionlist').hide();
        $('#newquestion').load('edit_question.php');
        const question = questionList.get(questionId);
        uquestionId = questionId;
        details = question;
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