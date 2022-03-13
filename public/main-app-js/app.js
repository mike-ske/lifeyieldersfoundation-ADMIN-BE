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
                    toggleModal('popup-modal', true);
                }
                setInterval(() => {
                    window.location.reload()
                }, 2000);
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
        if (item.subject.value === "") {
            document.querySelector("#msg3").innerHTML =
                "Please provide a subject";
        } else {
            document.querySelector("#msg3").innerHTML = "";
        }

        if (item.message.value === "") {
            document.querySelector("#msg5").innerHTML =
                "Please provide a message";
        } else {
            document.querySelector("#msg5").innerHTML = "";
        }
    };



});


var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}