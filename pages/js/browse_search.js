$(document).ready(function() {

    page = getinfo("page");
    query = getinfo("query");
    disablebuttons();
    requestlist(query,page);
    $(document).on('click', '.next_button', function() {
        disablebuttons();
        page = getinfo("page");
        query = getinfo("query");
        requestlist(query,parseInt(page) + 1);

    });
    $(document).on('click', '.previous_button', function() {
        disablebuttons();
        page = getinfo("page");
        query = getinfo("query");
        requestlist(query,parseInt(page) - 1);

    });
    $(document).on('change', '.paginator_container_bottom .pageno_editable', function() {
        disablebuttons();
        query = getinfo("query");
        page2 = $(".paginator_container_bottom .pageno_editable").val();
        if (!$.isNumeric(page2)) {
            page2 = 1;
        }
        if (page2 < 1) {
            page2 = 1;
        }
        requestlist(query,page2);
    });
    $(document).on('change', '.paginator_container_top .pageno_editable', function() {
        disablebuttons();
        query = getinfo("query");
        page2 = $(".paginator_container_top .pageno_editable").val();
        if (!$.isNumeric(page2)) {
            page2 = 1;
        }
        if (page2 < 1) {
            page2 = 1;
        }
        requestlist(query,page2);
    });
    $(document).on('change','#query',function(){
        page = 1;
        query = $("#query").val();
        disablebuttons();
        requestlist(query,page);
    });
});

function getinfo(type) {
    var substring = window.location.search.substring(1);
    if(substring.includes("&page=")){
        if (type == "page") {
            return substring.split('&page=')[1];
        }
        if (type == "query") {
            if(substring.split('&page=')[0].includes("query=")){
                return substring.split('&page=')[0].split('query=')[1];
            }
            return "All";
        }
    }else if(substring.includes("&query=")){
        if (type == "page") {
            if(substring.split('&query=')[0].includes("page=")){
                return substring.split('&query=')[0].split('page=')[1];
            }
            return 1;
        }
        if (type == "query") {
            return substring.split('&query=')[1];
        }
    }else{
        if (type == "page") {
            return 1;
        }
        if (type == "query") {
            return "All";
        }
    }
}
function requestbackuplist(query,page){
    $.ajax({
        method: "POST",
        url: "./components/browselist_data.php",
        ContentType: 'application/json',
        dataType: 'json',
        data: {
            "page": page,
            "query": "All",
            "type": "Search",
        },
        success: function(msg) {
            if (msg["status"] == "Success") {
                updatelist(msg["id"],msg["name"],msg["instrument"],msg["date"],msg["length"],"Backup");
                updatepage(query,msg["page"], msg["pages"]);
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

function requestlist(query,page) {
    console.log(query)
    $.ajax({
        method: "POST",
        url: "./components/browselist_data.php",
        ContentType: 'application/json',
        dataType: 'json',
        data: {
            "page": page,
            "query": decodeURIComponent(query),
            "type": "Search",
        },
        success: function(msg) {
            if (msg["status"] == "Success") {

                updatelist(msg["id"],msg["name"],msg["instrument"],msg["date"],msg["length"],"Main");
                updatepage(msg["query"],msg["page"], msg["pages"]);
                updateimage("Found");
                updateborder("Found");
                enablebuttons(msg["previous"], msg["next"]);
            } else {
                if (msg.hasOwnProperty('errortxt')) {
                    if(msg["errortxt"]=="Database Error: No Records Found."){
                        //Do Something
                        updateimage("NotFound");
                        updateborder("NotFound");
                        requestbackuplist(query,page);
                    }else{
                        updateerror(msg["errortxt"]);
                    }
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
    if(type=="Found"){
        $("#image1").attr("src", "./images/browse_search_image_found.jpg");
        $("#image2").attr("src","./images/browse_search_image2_found.jpg");
    }else{
        $("#image1").attr("src", "./images/browse_search_image_notfound.jpg");
        $("#image2").attr("src","./images/browse_search_image2_notfound.jpg");
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

function updateborder(type){
    if(type=="Found"){
        $("#query").css("border","1px solid #c7c3c3");
    }else{
        $("#query").css("border","2px solid #990000");
    }
}

function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    //encodedString = encodedString.replace(/\+/g," ");
    console.log(encodedString);
    textArea.innerHTML = encodedString;
    return textArea.value;
}

function updatepage(query,page, pages) {
    $(".pageno_readonly").html(pages);
    $(".pageno_editable").val(page);
    document.getElementById("query").value = decodeEntities(query);
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?query=' + query + '&page=' + page;
    window.history.pushState({
        path: newurl
    }, '', newurl);
}

function updatelist(id,name,instrument,date,length,listtype) {
    var list_data="";
    if(listtype=="Backup"){
        list_data=list_data+'<div class="row">';
        list_data=list_data+'<div class="col-12"><p style="color: #990000; font-size: 1.3rem; text-align: center;">"While we add more sheets<br>you continue your journey<br>with our most trendy..."</p></div>';
        list_data=list_data+'</div>';
        list_data=list_data+'<hr>';
    }
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
    $(".error_container").html("<div class='row'><image src='./images/downloadsheet_image.jpg' style='width: 100%;'/><div class='connection_error col-12'><h4 class='connection_error_text'>" + msg +
        "</h4></div></div>");
    $(".paginator_container_top").hide();
    $(".paginator_container_bottom").hide();
    $(".content_container").html("");
    $(".header").hide();
    $(".page_divider").hide();
}