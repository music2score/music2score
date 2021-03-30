$(document).ready(function() {
    page = getinfo("page");
    type = getinfo("type");
    disablebuttons();
    requestlist(type,page);
    $(document).on('click', '.next_button', function() {
        disablebuttons();
        page = getinfo("page");
        type = getinfo("type");
        requestlist(type,parseInt(page) + 1);

    });
    $(document).on('click', '.previous_button', function() {
        disablebuttons();
        page = getinfo("page");
        type = getinfo("type");
        requestlist(type,parseInt(page) - 1);

    });
    $(document).on('change', '.pageno_editable', function() {
        disablebuttons();
        type = getinfo("type");
        page2 = $(".pageno_editable").val();
        if (!$.isNumeric(page2)) {
            page2 = 1;
        }
        if (page2 < 1) {
            page2 = 1;
        }
        requestlist(type,page2);
    });
    $(document).on('change','.instrument_selector',function(){
        page = 1;
        type = $(".instrument_selector").val();
        disablebuttons();
        requestlist(type,page);
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
    if (type == "type") {
        for (var i = 0; i < param.length; i++) {
            if (param[i].split('=')[0] == "type") {
                return param[i].split('=')[1];
            }
        }
        return "All";
    }
}

function requestlist(type,page) {
    $.ajax({
        method: "POST",
        url: "./components/browselist_data.php",
        ContentType: 'application/json',
        dataType: 'json',
        data: {
            "page": page,
            "type": type
        },
        success: function(msg) {
            if (msg["status"] == "Success") {
                updatelist(msg["id"],msg["name"],msg["instrument"],msg["date"],msg["length"]);
                updatepage(msg["type"],msg["page"], msg["pages"]);
                updateimage(msg["type"]);
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

function updateimage(type){
    if(type=="Violin"){
        $("#image1").attr("src", "./images/browse_instrument_image_violin.jpg");
        $("#image2").attr("src","./images/browse_instrument_image2_violin.jpg");
    }else if(type=="Flute"){
        $("#image1").attr("src", "./images/browse_instrument_image_flute.jpg");
        $("#image2").attr("src","./images/browse_instrument_image2_flute.jpg");
    }else{
        $("#image1").attr("src", "./images/browse_instrument_image_all.jpg");
        $("#image2").attr("src","./images/browse_instrument_image2_all.jpg");
    }
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

function updatepage(type,page, pages) {
    $(".pageno_readonly").html(pages);
    $(".pageno_editable").val(page);
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?type=' + type + '&page=' + page;
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
    $(".content_container").html("");
    $(".header").hide();
    $(".page_divider").hide();
}