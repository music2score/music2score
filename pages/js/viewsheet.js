$(document).ready(function() {
    jobno = getinfo("jobno");
    page = getinfo("page");
    disablebuttons();
    requestimage(jobno, page);
    $(document).on('click', '.next_button', function() {
        disablebuttons();
        jobno = getinfo("jobno");
        page = getinfo("page");
        requestimage(jobno, parseInt(page) + 1);

    });
    $(document).on('click', '.previous_button', function() {
        disablebuttons();
        jobno = getinfo("jobno");
        page = getinfo("page");
        requestimage(jobno, parseInt(page) - 1);

    });
    $(document).on('change', '.paginator_container_bottom .pageno_editable', function() {
        disablebuttons();
        jobno = getinfo("jobno");
        page2 = $(".paginator_container_bottom .pageno_editable").val();
        if (!$.isNumeric(page2)) {
            page2 = 1;
        }
        if (page2 < 1) {
            page2 = 1;
        }
        requestimage(jobno, page2);
    });
    $(document).on('change', '.paginator_container_top .pageno_editable', function() {
        disablebuttons();
        jobno = getinfo("jobno");
        page2 = $(".paginator_container_top .pageno_editable").val();
        if (!$.isNumeric(page2)) {
            page2 = 1;
        }
        if (page2 < 1) {
            page2 = 1;
        }
        requestimage(jobno, page2);
    });
});

function getinfo(type) {
    var substring = window.location.search.substring(1);
    var param = substring.split('&');
    if (type == "jobno") {
        for (var i = 0; i < param.length; i++) {
            if (param[i].split('=')[0] == "jobno") {
                return param[i].split('=')[1];
            }
        }
        return 0;
    }
    if (type == "page") {
        for (var i = 0; i < param.length; i++) {
            if (param[i].split('=')[0] == "page") {
                return param[i].split('=')[1];
            }
        }
        return 1;
    }
}

function requestimage(jobno, page) {
    $.ajax({
        method: "POST",
        url: "./components/viewsheet_data.php",
        ContentType: 'application/json',
        dataType: 'json',
        data: {
            "jobno": jobno,
            "page": page
        },
        success: function(msg) {
            if (msg["status"] == "Success") {
                updateimage(msg["url"]);
                updatepage(msg["page"], msg["pages"], jobno);
                enablebuttons(msg["previous"], msg["next"]);
            } else {
                if (msg.hasOwnProperty('errortxt')) {
                    updateerror(msg["errortxt"]);
                } else {
                    updateerror("Oops! Something Went Wrong.");
                }
            }
        },
        failure: function(msg) {
            updateerror("Failed To Get Image Data!");
        },
        error: function(msg) {
            updateerror("Oops! Something Went Wrong.");
        }
    });
}

function disablebuttons() {
    $("a.previous_button").addClass("previous_gray_button");
    $("a.next_button").addClass("next_gray_button");
    $("a.previous_gray_button").removeClass("previous_button");
    $("a.next_gray_button").removeClass("next_button");
}

function enablebuttons(previous, next) {
    if (previous == 1) {
        $("a.previous_gray_button").addClass("previous_button");
        $("a.previous_button").removeClass("previous_gray_button");
    }
    if (next == 1) {
        $("a.next_gray_button").addClass("next_button");
        $("a.next_button").removeClass("next_gray_button");
    }
}

function updatepage(page, pages, jobno) {
    $(".pageno_readonly").html(pages);
    $(".pageno_editable").val(page);
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?jobno=' + jobno +
        '&page=' + page;
    window.history.pushState({
        path: newurl
    }, '', newurl);
}

function updateimage(url) {
    $("#image").attr("src", url);
}

function updateerror(msg) {
    updateimage("./images/downloadsheet_image.jpg");
    $(".error_container").html("<div class='connection_error col-12'><h4 class='connection_error_text'>" + msg +
        "</h4></div>");
    $(".paginator_container_top").hide();
    $(".paginator_container_bottom").hide();
}