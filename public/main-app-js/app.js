//Test jQuery
$(function() {

    $('#inbox').on('click', function() {
        $('#messagebox').fadeToggle()
    })
    $('#addStudent').on('click', function() {
        $('#student').fadeIn()
        $('#admin').hide()
    })

    // $('#mailModal').hide();

    $('#mailForm').on('submit', function(event) {
        event.preventDefault()
            // 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        form = new FormData(this);
        $("#preloader").fadeIn();

        validateMail($('#mailForm')[0])
        url = $(this).attr('action');

        $.ajax({
            url: url,
            method: 'POST',
            data: form,
            contentType: false,
            processData: false,
            success: function(result) {
                $("#preloader").fadeOut();
                if (result.message) {
                    $('#msg1').html(result.message.tomailer)
                    $('#msg2').html(result.message.subject)
                    $('#msg4').html(result.message.message)
                }
                $("input[type=text], input[type=password], input[type=email], input[type=number],textarea, select").val("");
                if (result.success) {
                    $('#alert').html(result.success)
                        // $('#popup-modal').removeClass('hidden');
                        // $('#popup-modal').addClass('flex');
                    toggleModal('popup-modal', true);
                }

                $("input[type=text], input[type=password], input[type=email], input[type=number],textarea, select").val("");
            }
        })
    })


    function validateMail(item) {
        if (item.tomailer.value === "") {
            document.querySelector("#msg1").innerHTML =
                "The admin email is required";
        } else {
            document.querySelector("#msg1").innerHTML = "";
        }
        // if (item.toStudent.value === "") {
        //     document.querySelector("#msg2").innerHTML =
        //         "The student email is required";
        // } else {
        //     document.querySelector("#msg2").innerHTML = "";
        // }
        if (item.subject.value === "") {
            document.querySelector("#msg3").innerHTML =
                "Please provide a subject";
        } else {
            document.querySelector("#msg3").innerHTML = "";
        }
        // if (item.from.value === "") {
        //     document.querySelector("#msg4").innerHTML =
        //         "The from field is required";
        // } else {
        //     document.querySelector("#msg4").innerHTML = "";
        // }
        if (item.message.value === "") {
            document.querySelector("#msg5").innerHTML =
                "Please provide a message";
        } else {
            document.querySelector("#msg5").innerHTML = "";
        }
    };

});