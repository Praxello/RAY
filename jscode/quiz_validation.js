$(function() {
    var jvalidate=$("#questionForm").validate( {
        ignore: [], rules: {
            question: {
                required: true, minlength: 5,   
            }
            , option1: {
                required: true, minlength: 2
            }
            
            , option2: {
                required: true, minlength: 2
            }

            , option3: {
                required: true, minlength: 2
            }

            , option4: {
                required: true, minlength: 2
            }
        }

        , messages: {
            question: {
                required: "Please write a question?", minlength: "Question Length Exceed more than 5 characters"
            }
            , option1: {
                required: "Write option A", minlength: "Enter minimum words"
            }
            
            , option2: {
                required: "Write option B", minlength: "Enter minimum words"
            }
            , option3: {
               
                required: "Write option C", minlength: "Enter minimum words"
        }
        , option4: {
            required: "Write option D", minlength: "Enter minimum words"
        }
    }
});
});