//Test jQuery
$(function() {

    $('#addAdmin').on('click', function() {
        $('#admin').fadeIn()
        $('#student').hide()
    })
    $('#addStudent').on('click', function() {
        $('#student').fadeIn()
        $('#admin').hide()
    })

    // $('#mailForm').on('submit', function(event) {
    //     event.preventDefault()

    //     form = new FormData(this);
    //     validateMail($('#mailForm')[0])
    //     url = $(this).attr('action');

    //     $.ajax({
    //         url: url,
    //         method: 'POST',
    //         data: form,
    //         contentType: false,
    //         processData: false,
    //         success: function(result) {
    //             result = JSON.parse(result);
    //             console.log(result);
    //         }
    //     })
    // })


    // function validateMail(item) {
    //     if (item.toAdmin.value === "") {
    //         document.querySelector("#msg1").innerHTML =
    //             "The admin email is required";
    //     } else {
    //         document.querySelector("#msg1").innerHTML = "";
    //     }
    //     if (item.toStudent.value === "") {
    //         document.querySelector("#msg2").innerHTML =
    //             "The student email is required";
    //     } else {
    //         document.querySelector("#msg2").innerHTML = "";
    //     }
    //     if (item.subject.value === "") {
    //         document.querySelector("#msg3").innerHTML =
    //             "Please provide a subject";
    //     } else {
    //         document.querySelector("#msg3").innerHTML = "";
    //     }
    //     // if (item.from.value === "") {
    //     //     document.querySelector("#msg4").innerHTML =
    //     //         "The from field is required";
    //     // } else {
    //     //     document.querySelector("#msg4").innerHTML = "";
    //     // }
    //     if (item.message.value === "") {
    //         document.querySelector("#msg5").innerHTML =
    //             "Please provide a message";
    //     } else {
    //         document.querySelector("#msg5").innerHTML = "";
    //     }
    // };

});