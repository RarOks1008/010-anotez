function check_params(email, password) {
    var email_pattern = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email == "" || password == "") {
        document.getElementById("error_text_place").innerHTML = "Email and password must not be empty";
        return false;
    }
    if (!email_pattern.test(email)) {
        document.getElementById("error_text_place").innerHTML = "Email not valid";
        return false;
    }
    document.getElementById("error_text_place").innerHTML = "";
    return true;
}
function login_check() {
    var email = document.getElementById("email").value,
        password = document.getElementById("password").value;
    return check_params(email, password);
}
function register_check() {
    var email = document.getElementById("email").value,
        password = document.getElementById("password").value;
    return check_params(email, password);
}
function note_check() {
    var title = document.getElementById("note_title").value,
        text = tinyMCE.get('note_text').getContent();
    if (title == '' || text == '') {
        document.getElementById("error_text").innerHTML = "None field should be left empty.";
        return false;
    }
    document.getElementById("error_text").innerHTML = "";
    return true;
}
function addcategory_check() {
    var name = document.getElementById("categoryname").value,
        color = document.getElementById("categorycolor").value;
    if (name == '' || color == '') {
        document.getElementById("error_text").innerHTML = "None field should be left empty.";
        return false;
    }
    document.getElementById("error_text").innerHTML = "";
    return true;
}
function admin_add_user() {
    var email = document.getElementById("email").value,
        password = document.getElementById("password").value,
        email_pattern = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email == "" || password == "") {
        document.getElementById("error_text").innerHTML = "Email and password must not be empty";
        return false;
    }
    if (!email_pattern.test(email)) {
        document.getElementById("error_text").innerHTML = "Email not valid";
        return false;
    }
    document.getElementById("error_text").innerHTML = "";
    return true;
}
function admin_edit_user() {
    var email = document.getElementById("email").value,
        email_pattern = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email == "") {
        document.getElementById("error_text").innerHTML = "Email must not be empty";
        return false;
    }
    if (!email_pattern.test(email)) {
        document.getElementById("error_text").innerHTML = "Email not valid";
        return false;
    }
    document.getElementById("error_text").innerHTML = "";
    return true;
}
function admin_add_author() {
    var authorimage = document.getElementById("authorimage").value;
    if (authorimage == "") {
        document.getElementById("error_text").innerHTML = "Must select an image";
        return false;
    }
    document.getElementById("error_text").innerHTML = "";
    return true;
}
function contact_check() {
    var title = document.getElementById("title").value,
        content = document.getElementById("content").value;
    if (title == "" || content == "") {
        $(".error_text").html("None field must be left empty");
        return false;
    }
    $(".error_text").html("");
    return true;
}
