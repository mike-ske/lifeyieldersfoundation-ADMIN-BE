4
//Test jQuery
$(function() {
    $('#searchId').on('keyup', function() {
        $('#popup-modal2').removeClass('hidden')
        $('#sliderbox').fadeIn('slow')

    })
})

function search(q) {
    if (q.value === "") {
        $('#deviceresult').html("<h3 id='alert' class='mb-5 mr-2 text-xs font-normal text-gray-500 dark:text-gray-400'>No Search Result Found</h3>")
    } else {

        url = '../search/' + q.value;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(result) {
                if (result) {
                    $('#deviceresult').html("<div id='message' class='flex mb-2 items-center justify-start w-full'>" + result.device + "</div>")
                }
            }
        })
    }
}