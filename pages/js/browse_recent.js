$(document).ready(function() {
    page = getinfo("page");
    disablebuttons();
    requestlist(page);
    $(document).on('click', '.next_button', function() {
        disablebuttons();
        page = getinfo("page");
        requestlist(parseInt(page) + 1);

    });
    $(document).on('click', '.previous_button', function() {
        disablebuttons();
        page = getinfo("page");
        requestlist(parseInt(page) - 1);

    });
    $(document).on('change', '.paginator_container_bottom .pageno_editable', function() {
        disablebuttons();
        page2 = $(".paginator_container_bottom .pageno_editable").val();
        if (!$.isNumeric(page2)) {
            page2 = 1;
        }
        if (page2 < 1) {
            page2 = 1;
        }
        requestlist(page2);
    });
    $(document).on('change', '.paginator_container_top .pageno_editable', function() {
        disablebuttons();
        page2 = $(".paginator_container_top .pageno_editable").val();
        if (!$.isNumeric(page2)) {
            page2 = 1;
        }
        if (page2 < 1) {
            page2 = 1;
        }
        requestlist(page2);
    });
});

function getinfo(type) {
    var substring = window.location.search.substring(1);
    var param = substring.split('&');
    if (type == "page") {
        for (var i = 0; i < param.length; i++) {
            if (param[i].split('=')[0] == "page") {
                return param[i].split('=')[1];
            }
        }
        return 1;
    }
}

function requestlist(page) {
    $.ajax({
        method: "POST",
        url: "./components/browselist_data.php",
        ContentType: 'application/json',
        dataType: 'json',
        data: {
            "page": page,
            "type": "All"
        },
        success: function(msg) {
            if (msg["status"] == "Success") {
                updatelist(msg["id"],msg["name"],msg["instrument"],msg["date"],msg["length"]);
                updatepage(msg["page"], msg["pages"]);
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

function updatepage(page, pages) {
    $(".pageno_readonly").html(pages);
    $(".pageno_editable").val(page);
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?page=' + page;
    window.history.pushState({
        path: newurl
    }, '', newurl);
}

function updatelist(id,name,instrument,date,length) {
    var list_data="";
    for(var i=0; i<length; i++){
        list_data=list_data+'<div class="row">';
        list_data=list_data+'<div class="col-12 col-md-6"><p><b>Name:</b> '+name[i]+'.</p></div>';
        list_data=list_data+'<div class="col-12 col-md-6"><p><b>Date/Time:</b>&nbsp; '+date[i]+'</p></div>';
        list_data=list_data+'</div>';
        list_data=list_data+'<div class="row">';
        list_data=list_data+'<div class="col-12 col-md-6"><p><b>Instrument:</b> '+instrument[i]+'.</p></div>';
        list_data=list_data+'<div class="col-12 col-md-6">';
        list_data=list_data+'<button type="button" class="button_class" onclick="window.location.href=\'./browse_view.php?musicid='+id[i]+'&page=1\';">View</button>';
        list_data=list_data+'<button type="button" class="button_class" onclick="window.location.href=\'./browse_download.php?musicid='+id[i]+'\';">Download</button></div>';
        list_data=list_data+'</div>';
        list_data=list_data+'<hr>';
    }
    $(".content_container").html(list_data);
}

function updateerror(msg) {
    //updatelist("<image src='./images/downloadsheet_image.jpg' style='width: 100%;'/>");
    $(".error_container").html("<div class='row'><image src='./images/downloadsheet_image.jpg' style='width: 100%;'/><div class='connection_error col-12'><h4 class='connection_error_text'>" + msg +
        "</h4></div></div>");
    $(".paginator_container_top").hide();
    $(".paginator_container_bottom").hide();
    $(".header").hide();
    $(".page_divider").hide();
}