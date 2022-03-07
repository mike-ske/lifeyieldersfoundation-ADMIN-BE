//Test jQuery
$(function() {
    $('#pending').on('load', function() {
        $(this).prop('disabled', true);
        $(this).css({ 'opacity': '0.2', 'background': 'transparent' })
    })

    //  detect mobile device
    $('#test').on('click', function() {
        console.log("<?php header('location: ../') ?>");

        // if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        //     alert("YOU CANNOT VIEW THIS PAGE ON MOBILE AND TABLET SCREENS.");
        //     window.location.replace("http://127.0.0.1:8000/");
        //     document.write("You will be redirected to main page in 10 sec.........");
        //     setTimeout(() => {}, 10000);

        // } else {
        //     // document.write("");
        // }

    })
});