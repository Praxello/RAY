const data = {
    userId: 1
};
<<<<<<< HEAD:jscode/questionanswer.js
var questionId = null; //for updation
=======
var uquestionId = null; //for updation
>>>>>>> 0422c965dc7fdf0b4a5152c22b442b82d1425bfd:jscode/quiz.js
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
<<<<<<< HEAD:jscode/questionanswer.js
    // console.log(questionList);
    $('.vendors').dataTable().fnDestroy();
=======
    $('#quiz').dataTable().fnDestroy();
>>>>>>> 0422c965dc7fdf0b4a5152c22b442b82d1425bfd:jscode/quiz.js
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
<<<<<<< HEAD:jscode/questionanswer.js
        const vendor = questionList.get(vendorId);
        questionId = vendorId;
        details = vendor;
=======
        const question = questionList.get(questionId);
        uquestionId = questionId;
        details = question;
>>>>>>> 0422c965dc7fdf0b4a5152c22b442b82d1425bfd:jscode/quiz.js
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