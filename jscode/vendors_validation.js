$(function() {
    var jvalidate=$("#vendorForm").validate( {
        ignore: [], rules: {
            fname: {
                required: true, maxlength: 50
            }
            , lname: {
                required: true, maxlength: 50
            }
            
            , contactNumber: {
                required: true, number: true, maxlength: 10
            }
            , emailId: {
                required: true, minlength: 6
            }
            , pincode: {
                minlength: 6, maxlength: 6
            }
        }
        , messages: {
            fname: {
                required: "Please enter first name", maxlength: "Length Exceed upto 50 characters"
            }
            , lname: {
                required: "Please enter Last name", maxlength: "Length Exceed upto 50 characters"
            }
            
            , contactNumber: {
                required: "Please enter mobile number", number: "enter valid number", maxlength: "Should enter max 10 digits"
            }
            , emailId: {
               
                required: "Enter valid Email Id", minlength: "Example@gmail.com"
        }
        , pincode: {
            minlength: "Please enter minimum 6 digits", maxlength: "It cannot be exceed more than 6 digits"
        }
    }
});
});