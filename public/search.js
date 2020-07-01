$(document).ready(function () {
    get_notes("", 0, 1);
    $("#search_notes").keyup(function() {
        var search_text = $("#search_notes").val(),
            category_select = $("#category_select").val(),
            page = $("#current_page").html();
        if (!page) { page = 1; }
        get_notes(search_text, category_select, page);
    });
    $("#category_select").change(function() {
        var search_text = $("#search_notes").val(),
            category_select = $("#category_select").val(),
            page = $("#current_page").html();
        if (!page) { page = 1; }
        get_notes(search_text, category_select, page);
    });
});

function get_notes(title, category, page) {
    $.ajax({
        url: "/get_notes",
        method: "GET",
        dataType: "json",
        data: {
            title: title,
            category: category,
            page: page,
            _token: csrf
        },
        success: function (data) {
            if(!data.data.length && data.total > 0) {
                get_notes(title, category, page - 1);
            } else {
                fill_note_data(data);
            }
        },
        error: function (err) {
            $(".error_text").html(err.responseText);
        }
    });
}

function fill_note_data(data) {
    var note_holder = document.getElementById("my_notes"),
        text = "";
    if (data.total == 0) {
        text = `<h2 class="no_notes_text">You don't have any notes so far. You can add your first one by clicking + symbol.</h2>`;
    } else {
        text = `<ul class="my_notes">`;
        data.data.forEach(function (note) {
            var note_text = "";
            if (note.text.indexOf("<li>") >= 0) {
                note_text = note.text.substring(note.text.indexOf("<li>") + 4, note.text.indexOf("</li>"));
            } else if (note.text.indexOf("<p>") >= 0) {
                note_text = note.text.substring(note.text.indexOf("<p>") + 3, note.text.indexOf("</p>"));
            } else if (note.text.indexOf("<h1>") >= 0) {
                note_text = note.text.substring(note.text.indexOf("<h1>") + 4, note.text.indexOf("</h1>"));
            } else if (note.text.indexOf("<h2>") >= 0) {
                note_text = note.text.substring(note.text.indexOf("<h2>") + 4, note.text.indexOf("</h2>"));
            } else if (note.text.indexOf("<h3>") >= 0) {
                note_text = note.text.substring(note.text.indexOf("<h3>") + 4, note.text.indexOf("</h3>"));
            } else if (note.text.indexOf("<h4>") >= 0) {
                note_text = note.text.substring(note.text.indexOf("<h4>") + 4, note.text.indexOf("</h4>"));
            } else if (note.text.indexOf("<h5>") >= 0) {
                note_text = note.text.substring(note.text.indexOf("<h5>") + 4, note.text.indexOf("</h5>"));
            } else if (note.text.indexOf("<h6>") >= 0) {
                note_text = note.text.substring(note.text.indexOf("<h6>") + 4, note.text.indexOf("</h6>"));
            } else {
                note_text = note.text.substring(note.text.indexOf("<div>") + 5, note.text.indexOf("</div>"));
            }
            text += `<li><div class="note_category_color" style="color: ${note.color};"><abbr title="${note.name}">&#8226;</abbr></div><div class="note_info_section"><a href="/note/${note.id}"><h3>${note.title}</h3><p>${note_text}</p></a></div><div class="note_delete_area"><a href="/deletenote/'${note.id}"><span class="fa fa-trash" aria-hidden="true"></span></a></div></li>`;
        });
        text += `</ul>`;
        text += `<ul id="note_paging">`;
        for (var i = 1; i <= data.last_page; i++) {
            if (i == data.current_page) {
                text += `<li id="current_page">${i}</li>`;
            } else {
                text += `<li>${i}</li>`;
            }
        }
        text += `</ul>`;
    }
    note_holder.innerHTML = text;
    $("#note_paging li").on("click", function() {
        if ($(this).attr("id") == "current_page") { return; }
        var search_text = $("#search_notes").val(),
            category_select = $("#category_select").val(),
            page = $(this).html();
        get_notes(search_text, category_select, page);
    });
}
