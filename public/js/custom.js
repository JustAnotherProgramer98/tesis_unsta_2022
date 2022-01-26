//Move between tabs
function openNewTab(evt, tab_name) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tab_name).style.display = "block";
    evt.currentTarget.className += " active";
}

//Search cities by Province_id
function searchByProvincia(url) {
    var province_id = $("#search_cities_by_province_id").val();
    $.ajax({
        url:url,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
        type: 'POST',
        data: {
            province_id: province_id
        },

        success: (result) => {
            $("#city_name").replaceWith(result);
        },
        failure: (result) => alert(msg_error),
    }); //fin Ajax 
}