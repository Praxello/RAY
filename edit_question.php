<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Update Question Details</h3></div>

        <div class="card-body">
            <form class="forms-sample" id="questionForm" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleTextarea">Question </label>
                            <textarea class="form-control" id="question" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputMobileno">Option A</label>
                            <input type="text" class="form-control" id="option1" placeholder="Option 1">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Option B</label>
                            <input type="text" class="form-control" id="option2" placeholder="Option 2">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputMobileno">Option C</label>
                            <input type="text" class="form-control" id="option3" placeholder="Option 3">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Option D</label>
                            <input type="text" class="form-control" id="option4" placeholder="Option 4">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleTextarea">Answer Description</label>
                            <textarea class="form-control" id="ansdesc" rows="3" placeholder="Short Answer Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleSelectPincode">Category</label>
                            <select class="form-control select2" id="categoryId">
                                <option value="1">Option A</option>
                                <option value="2">Option B</option>
                                <option value="3">Option C</option>
                                <option value="4">Option D</option>

                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleSelectLandline">Correct Option</label>
                            <select class="form-control select2" id="correctoption">
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
<script>
    function loadDetails(product) {
    $('#question').val(product.question);
    $('#option1').val(product.option1);
    $('#option2').val(product.option2);
    $('#option3').val(product.option3);
    $('#option4').val(product.option4);
    $('#ansdesc').val(product.ansdes);
    $('#categoryId').val(product.categoryId).trigger('change');
    $('#correctoption').val(product.correctoption).trigger('change');
}
loadDetails(details);
    $('#questionForm').on('submit', function(e) {
        e.preventDefault();
        const questionDetails = {
            questionId:questionId,
            userId: 1,
            categoryId: $('#categoryId').val(),
            question: $('#question').val(),
            option1: $('#option1').val(),
            option2: $('#option2').val(),
            option3: $('#option3').val(),
            option4: $('#option4').val(),
            correctoption: $('#correctoption').val(),
            ansdes: $('#ansdesc').val()
        };
        $.ajax({
            url: url + 'editquestionanswer.php',
            type: 'POST',
            data: questionDetails,
            dataType: 'json',
            success: function(response) {
                if (response.Responsecode == 200) {
                    console.log(response.Data);
                    questionList.set(response.Data.userId, response.Data);
                    showquestion(questionList);
                    goback();
                }
            }
        });
    });
</script>