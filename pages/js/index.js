$(document).ready(function() {
    page = 1;
    requestlist(page);
});

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

function updatelist(id,name,instrument,date,length) {
    var list_data="";
    if(length>3){
        length=3;
    }
    for(var i=0; i<length; i++){
        list_data=list_data+'<div class="library_card">';
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
        list_data=list_data+'</div>';
    }
    $(".library_card_container").html(list_data);
}

function updateerror(msg) {
    //updatelist("<image src='./images/downloadsheet_image.jpg' style='width: 100%;'/>");
    $(".library_card_container").html("<div class='row'><div class='connection_error col-12'><h4 class='connection_error_text'>" + msg +
        "</h4></div></div>");
}