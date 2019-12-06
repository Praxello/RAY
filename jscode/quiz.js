const data = {
    userId: 1
};
var uquestionId = null; //for updation
var details = {};

var categoryList = new Map(); // category Map
var categorytblList = new Map();  // Only for table category shows
const showcategory = categorytblList => {
    $('#quiz').dataTable().fnDestroy();
    $('.vendorData').empty();
    var tblData = '';
    for (let k of categorytblList.keys()) {
        let category = categorytblList.get(k);
        // console.log(category);
        tblData += '<tr><td>' + category.categoryname + '</td>';
        tblData += '<td>' + category.countquestion + '</td>';

        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editquestion(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.vendorData').html(tblData);
    $('#quiz').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}
const listcategorywise = () => {
    $.ajax({
        url: url + 'questioncategorywise.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          // console.log(response);
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    categorytblList.set(response.Data[i].categoryId, response.Data[i]);
                }
                showcategory(categorytblList);
            }
        }
    });
}
listcategorywise();
const listcategory = () => {
    $.ajax({
        url: url + 'getallcategory.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    categoryList.set(response.Data[i].categoryId, response.Data[i]);
                }

            }
        }
    });
}
listcategory();




const editquestion = categoryId => {
    categoryId = categoryId.toString();
    if (categorytblList.has(categoryId)) {
        $('.questionlist').hide();
        $('#newquestion').load('edit_question.php');
        const category = categorytblList.get(categoryId);
        uquestionId = categoryId;
        details =category;
    } else {
        swal('something goes wrong');
    }
}

const removequestion = questionId => {
  // console.log(questionId);
  $.ajax({
      url: url + 'deletequestionanswer.php',
      type: 'POST',
      dataType: 'json',
      data:{
        questionId:questionId
      },
      success: function(response) {
        // console.log(response);
        if(response.Responsecode==200){
          categorytblList.clear(uquestionId);
          listcategorywise();
          goback();
          swal(response.Message);
        }

      }
  });


}

function addQuestion() {
    $('.questionlist').hide();
    $('#newquestion').load('add_question.php');
}

function goback() {
    $('#newquestion').empty();
    $('.questionlist').show();
}
