<style>
.error{
    color: red;
}
</style>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Add Question Details</h3></div>

        <div class="card-body">
            <form class="forms-sample" id="questionForm" method="POST">


                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="exampleTextarea">Question </label>
                              <textarea class="form-control" id="question" name="question" rows="3"></textarea>
                          </div>
                      </div>
                    </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputMobileno">Option A</label>
                            <input type="text" class="form-control" id="option1" name="option1" placeholder="Option 1">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Option B</label>
                            <input type="text" class="form-control" id="option2" name="option2" placeholder="Option 2">
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputMobileno">Option C</label>
                            <input type="text" class="form-control" id="option3" name="option3" placeholder="Option 3">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Option D</label>
                            <input type="text" class="form-control" id="option4" name="option4" placeholder="Option 4">
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleTextarea">Answer Description</label>
                            <textarea class="form-control" id="ansdesc" name="ansdesc" rows="3" placeholder="Short Answer Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleSelectPincode">Category</label>
                            <select class="form-control select2" id="categoryId" name="categoryId">
                                <!-- <option value="1">Option A</option>
                                <option value="2">Option B</option>
                                <option value="3">Option C</option>
                                <option value="4">Option D</option> -->

                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleSelectLandline">Correct Option</label>
                            <select class="form-control select2" id="correctoption"  name="correctoption">
                                <option value="1">Option A</option>
                                <option value="2">Option B</option>
                                <option value="3">Option C</option>
                                <option value="4">Option D</option>

                            </select>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary mr-2" value="Submit">
                <button class="btn btn-light" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.validate.js"></script>
<script src="jscode/quiz_validation.js"></script>
<script>
function loadcategory()
{
var html = '';
for(let k of categoryList.keys()){
  let categoryname = categoryList.get(k);
  html +='<option value='+categoryname.categoryId+'>'+categoryname.categoryname+'</option>';
}
$("#categoryId").html(html);
}
loadcategory();
$('#questionForm').on('submit', function(e) {
    e.preventDefault();
    const questionDetails = {
        userId: 1,
        categoryId: $('#categoryId').val(),
        question: $('#question').val(),
        option1: $('#option1').val(),
        option2: $('#option2').val(),
        option3: $('#option3').val(),
        option4: $('#option4').val(),
        correctoption: $('#correctoption').val(),
        ansdes:$('#ansdesc').val()
    };
    var retVal = $('#questionForm').valid();
    if(retVal){
    $.ajax({
        url: url + 'addquestionanswer.php',
        type: 'POST',
        data: questionDetails,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                swal(response.Message);

                listcategorywise();
                goback();
            }
        }
    });
}
});
</script>
<script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
