$(function() {
        var jvalidate = $("#questionForm").validate({
            ignore: [],
            rules: {
                question: {
                    required: true
                },
                option1: {
                    required: true
                },
                option2: {
                    required: true
                },
                option3: {
                    required: true
                },
                option4: {
                    required: true
                },
                categoryId: {
                    required: true
                },
                correctoption: {
                    required: true
                }
            },
            messages: {
                question: {
                    required: "Please write a question?"
                },
                option1: {
                    required: "Write option A"
                },
                option2: {
                    required: "Write option B"
                },
                option3: {
                    required: "Write option C"
                },
                option4: {
                    required: "Write option D"
                },
                categoryId: {
                    required: "Select option from list"
                },
                correctoption: {
                    required: "Select option from list"
                }
            }
        });
    }

);