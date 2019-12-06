<div id="editquestion"></div>

<div class="row">
  <div class="col-md-12">
      <div class="card task-board">
          <div class="card-header">
              <h3><span id="categoryname"></span> Question List</h3>
              <div class="card-header-right" style="margin-right: 100px;">
                  <button class="btn btn-primary" type="button" onclick="goback()">Back</button>
              </div>
              <div class="card-header-right">

                  <ul class="list-unstyled card-option">
                      <li><i class="ik ik-chevron-left action-toggle"></i></li>
                      <li><i class="ik ik-chevron-left action-toggle"></i></li>
                      <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                      <li><i class="ik ik-minus minimize-card"></i></li>
                      <li><i class="ik ik-x close-card"></i></li>
                  </ul>
              </div>
          </div>
          <div class="card-body todo-task">
              <div >
                  <ol class="dd-list" id="questionlist">


                  </ol>
              </div>

          </div>
      </div>
  </div>

</div>
<script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src=" plugins/nestable/jquery.nestable.js"></script>
<script src=" dist/js/theme.min.js"></script>
<script src=" js/taskboard.js"></script>

<script>
var questiondetails = {};
var spuquestionId = null; //for updation
var questionList1 = new Map();
function editquestioninner(questionId ) {
    questionId = questionId.toString();
    if (questionList1.has(questionId)) {
        $('.questionlist').hide();
        $('#newquestion').load('edit_questioninner.php');
        const spquestion = questionList1.get(questionId);
        spuquestionId = questionId;
        questiondetails =spquestion;
    } else {
        swal('something goes wrong');
    }
}

function questionList(categoryId){
  $.ajax({
      url: url + 'getallquestionanswerbyid.php',
      type: 'POST',
      dataType: 'json',
      data:{
        categoryId:categoryId
      },
      success: function(response) {
         // console.log(response);
        var questionhtml='';
          if (response.Data != null) {
              const count = response.Data.length;
              for (var i = 0; i < count; i++) {
                questionList1.set(response.Data[i].questionId, response.Data[i]);
                questionhtml+='<li class="dd-item" data-id="'+response.Data[i].questionId+'">';
                questionhtml+='    <div class="dd-handle">';
                questionhtml+='       <a href="#demo'+(i+1)+'" data-toggle="collapse" > <h6 style="color: #9d1111;font-weight: bolder;">'+(i+1)+' '+response.Data[i].question;
                questionhtml+=' </h6>';
                questionhtml+=' </a>';
                // questionhtml+'<div>';
                questionhtml+='<button type="button" class="btn btn-link"  style="float:right;" class="list-delete" onclick="removequestion('+response.Data[i].questionId+')"><i class="ik ik-trash-2"></i></button>';
                questionhtml+='<button type="button" class="btn btn-link" style="float:right;" onclick="editquestioninner('+response.Data[i].questionId+')" ><i class="ik ik-edit-2"></i></button>';

                questionhtml+=' </div>';

                questionhtml+='        <div id="demo'+(i+1)+'" class="collapse">';
                  questionhtml+='<div class="row">';
                  questionhtml+='<div class="col-sm-6">';
                  questionhtml+=response.Data[i].option1;
                  questionhtml+='</div>';
                  questionhtml+='<div class="col-sm-6">';
                  questionhtml+=response.Data[i].option2;
                  questionhtml+='</div>';
                  questionhtml+='</div>';
                  questionhtml+='<div class="row">';
                  questionhtml+='<div class="col-sm-6">';
                  questionhtml+=response.Data[i].option3;
                  questionhtml+='</div>';
                  questionhtml+='<div class="col-sm-6">';
                  questionhtml+=response.Data[i].option4;
                  questionhtml+='</div>';
                  questionhtml+='</div>';
                  questionhtml+='<div class="row">';
                  questionhtml+='<div class="col-sm-12" style="color: blue;font-weight: bold;">';
                  questionhtml+=response.Data[i].ansdes;
                  questionhtml+='</div>';
                  questionhtml+='</div>';
                questionhtml+='</div>';
                questionhtml+='    </div>';
                questionhtml+='</li>';
              }

              $("#categoryname").html(response.Data[0].categoryname);
              $("#questionlist").html(questionhtml);
          }
      }
  });
}
questionList(uquestionId);

</script>
