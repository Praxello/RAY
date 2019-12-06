$(function() {
    var jvalidate=$("#productform").validate( {
        ignore: [], rules: {
            productTitle: {
                required: true, minlength: 2, maxlength: 50
            }
            , category: {
                required: true, number: true
            }
            , price: {
                required: true, number: true
            }
            , GST: {
                required: true, minlength: 6, maxlength: 6
            }
        }
        , messages: {
            productTitle: {
                required: "Please enter a valid product name", minlength: "Enter a valid product", maxlength: "Length Exceed 50 characters"
            }
            , category: {
                required: "Please enter a category in numbers", number: "It should be number"
            }
            , price: {
                required: "Please enter price", number: "enter valid price"
            }
            , GST: {
              
                required: "Enter HSN Code", minlength: "It shouldn't be accept charectors or symbols, please enter valid 6 digits", maxlength: "It cannot be exceed mpre than 6 digits" 
            }
        }
    }
    );
}

);