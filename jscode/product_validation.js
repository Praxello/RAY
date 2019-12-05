$(function() {
    var jvalidate = $("#productform").validate({
        ignore: [],
        rules: {
            productTitle: {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            category: {
                required: true,
                number: true
            },
            price: {
                required: true,
                number: true
            }
        },
        messages: {
            productTitle: {
                required: "Please enter a valid email address",
                minlength: "Enter a value atleast two characters",
                maxlength: "Length Exceed 50 characters"
            },

            category: {
                required: "Please provide a password",
                number: "it should be number",
            },
            price: {
                required: "Please number",
                number: "true"
            }
        }
    });
});