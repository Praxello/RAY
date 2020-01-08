$(function() {
        var jvalidate = $("#vendorForm").validate({
            ignore: [],
            rules: {
                fname: {
                    required: true,
                    maxlength: 50
                },
                lname: {
                    required: true,
                    maxlength: 50
                },
                password: {
                    required: true
                },
                contactNumber: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                emailId: {
                    required: true,
                    email: true
                },
                pincode: {
                    minlength: 6,
                    maxlength: 6
                }
            },
            messages: {
                fname: {
                    required: "Please enter first name",
                    maxlength: "Length Exceed upto 50 characters"
                },
                lname: {
                    required: "Please enter Last name",
                    maxlength: "Length Exceed upto 50 characters"
                },
                password: {
                    required: "Please enter Password",
                },
                contactNumber: {
                    required: "Please enter mobile number",
                    number: "enter valid number",
                    minlength: "Should enter max 10 digits",
                    maxlength: "Only 10 Digit Mobile Number accepted"
                },
                emailId: {
                    required: "Enter an Email Id",
                    email: "Enter an valid email address"
                },
                pincode: {
                    minlength: "Please enter minimum 6 digits",
                    maxlength: "It cannot be exceed more than 6 digits"
                }
            }
        });
    }

);