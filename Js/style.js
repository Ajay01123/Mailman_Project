
// $('#login').onsubmit(function (e) {
//     e.preventDefault();


//   });

function validation() {

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var email_pattern = /^[\w.+\-]+@gmail\.com$/

    var email_status;
    var password_status;
    if (email == "") {
        document.getElementById("semail").innerHTML = "Please fill the email id";

        email_status = false;
    } else if (testWhiteSpace(email) == true) {
        document.getElementById("semail").innerHTML = "Please remove space";
        email_status = false;
    }

    else {
        document.getElementById("semail").innerHTML = "";

        email_status = true;
    }
    if (password == "") {
        document.getElementById("pass").innerHTML = "Please fill the password";

        password_status = false;

    }
    else {
        document.getElementById("pass").innerHTML = "";

        password_status = true;
    }
    if (password_status == false || email_status == false) {
        return false;
    }

}
function testWhiteSpace(string) {

    return string && / /.test(string) ? true : false
}

email.addEventListener("keyup", function () {
    document.getElementById("semail").innerHTML = "";

})
password.addEventListener("keyup", function () {
    document.getElementById("pass").innerHTML = "";

})

