//Test jQuery
$(function() {

    $('#inbox').on('click', function() {
        $('#messagebox').fadeToggle()
    })
    $('#addStudent').on('click', function() {
        $('#student').fadeToggle()
        $('#admin').hide()
    })


    $('#mailForm').on('submit', function(event) {
        event.preventDefault()
            // 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        form = new FormData(this);
        $("#preloader").fadeIn();

        // validateMail($('#mailForm')[0])
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
                    toggleModal('popup-modal', true);
                    setInterval(() => {
                        window.location.reload()
                    }, 2000);
                }
                $("input[type=text], input[type=password], input[type=email], input[type=number],textarea, select").val("");
            }
        })
    })

    $('#mailStudent').on('submit', function(event) {
        event.preventDefault()

        form1 = new FormData(this);
        // form1 = $('#mailStudent').serialize();

        // validateSendMail($('#mailStudent')[0]);
        url = $('#mailStudent').attr('action');
        // console.log(form1);

        $("#preloader").fadeIn();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: 'POST',
            data: form1,
            contentType: false,
            processData: false,
            success: function(result) {
                $("#preloader").fadeOut();

                if (result.message) {
                    $('#msg1').html(result.message.toStudent)
                    $('#msg2').html(result.message.subject)
                    $('#msg4').html(result.message.message)
                }
                setInterval(() => {
                    $('#msg1').html("")
                    $('#msg2').html("")
                    $('#msg4').html("")
                }, 4000);
                $("input[type=text], input[type=password], input[type=email], input[type=number],textarea, select").val("");

                if (result.success) {
                    console.log(result.success);
                    $('#alert').html(result.success)
                    toggleModal('popup-modal', true);
                }
                if (result.failed) {
                    $('#errmail').html(result.failed)
                    $('#mls').removeClass('hidden')
                }
                $("input[type=text], input[type=password], input[type=email], input[type=number],textarea, select").val("");
            },
            error: function(error) {
                console.log(error);
            }
        })
    })

    // function validateMail(item) {
    //     if (item.tomailer.value === "") {
    //         document.querySelector("#msg1").innerHTML = "The admin email is required";
    //     } else {
    //         document.querySelector("#msg1").innerHTML = "";
    //     }
    //     if (item.subject.value === "") {
    //         document.querySelector("#msg3").innerHTML = "Please provide a subject";
    //     } else {
    //         document.querySelector("#msg3").innerHTML = "";
    //     }

    //     if (item.message.value === "") {
    //         document.querySelector("#msg4").innerHTML = "Please provide a message";
    //     } else {
    //         document.querySelector("#msg4").innerHTML = "";
    //     }
    // };

    // function validateSendMail(item) {
    //     if (item.toStudent.value === "") {
    //         document.querySelector("#msg1").innerHTML =
    //             "The admin email is required";
    //     } else {
    //         document.querySelector("#msg1").innerHTML = "";
    //     }
    //     if (item.subject.value === "") {
    //         document.querySelector("#msg2").innerHTML =
    //             "The admin email is required";
    //     } else {
    //         document.querySelector("#msg2").innerHTML = "";
    //     }
    //     if (item.from.value === "") {
    //         document.querySelector("#msg3").innerHTML =
    //             "Please provide a subject";
    //     } else {
    //         document.querySelector("#msg3").innerHTML = "";
    //     }

    //     if (item.message.value === "") {
    //         document.querySelector("#msg4").innerHTML =
    //             "Please provide a message";
    //     } else {
    //         document.querySelector("#msg4").innerHTML = "";
    //     }
    // };


    //FETCH NOTIFICATIONS
    // setInterval(() => {
    //     url = '../getmail';
    //     $.ajax({
    //         url: url,
    //         method: 'GET',
    //         success: function(result) {
    //             if (result) {
    //                 $('#mt').html(result.notification)
    //                 $('#mt').removeClass('hidden')
    //                 $('#notebadge').removeClass('hidden')
    //                 $('#mt').addClass('inline-flex')
    //                 $('#notebadge').addClass('inline-block')
    //             }
    //         }
    //     })
    // }, 2000);

    //FETCH LATEST APPLICATIONS
    // setInterval(() => {
    //     url = '../getapplication';
    //     $.ajax({
    //         url: url,
    //         method: 'GET',
    //         success: function(result) {
    //             if (result) {
    //                 $('#newapp').html(result.notification)
    //                 $('#newapp').removeClass('hidden')
    //                 $('#notebadge').removeClass('hidden')
    //                 $('#newapp').addClass('inline-flex')
    //                 $('#notebadge').addClass('inline-block')
    //             }
    //         }
    //     })
    // }, 2000);

    $('#bdg').on('click', function() {
        $('#notebadge').hide()
    })


    $('#alx').on('click', function() {
        $('#newapp').val('')
    })

    $('#mbxt').on('click', function(e) {
        e.preventDefault()

        alert('testing')
        url = '../clearnotice';
        $.ajax({
            url: url,
            method: 'GET',
            success: function(result) {
                if (result.notification === '') {
                    $('#mt').hide()
                } else {
                    $('#mt').show()
                }
            }
        })
    })

});