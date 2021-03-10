var refresh_status = 0;
$(document).ready(function() {
    load_content();
    refresh_container();
});


function load_content() {
    $('.content_container').load("./components/download_list.php", function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            status_checker();
        }
        if (statusTxt == "error") {
            $('.content_container').html(
                "<div class='connection_error'><h4 class='connection_error_text'>Connection Error: Load Failed.</h4></div>"
            );
        }
    });
}

function status_checker() {
    refresh_status = 0;
    $(".status").each(function() {
        if ($(".status > p:contains('Queued')").length) {
            refresh_status = 1;
        }
    })
}

function refresh_container() {
    setInterval(function() {
        if (refresh_status == 1) {
            load_content();
        }
    }, 7000);
}