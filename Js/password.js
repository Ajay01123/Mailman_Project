function validation() {
    var pass = document.getElementById("pass").value;
    var cpass = document.getElementById("cpass").value;
    var spanpass = document.getElementById("password");
    var spancpass = document.getElementById("cpassword");
    // var pattern = /^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{7,}$/;
    if (pass == "") {
        spanpass.innerHTML = " ** Please fill the password";
        status_pass = false;
    } else if (pass.length < 6) {
        spanpass.innerHTML = "**Password length must be atleast 6 characters";
        status_pass = false;
    }
    else if (pass.search(/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{7,}$/)) {
        spanpass.innerHTML = "one upper case and lower case and digit ";
        status_pass = false;

    }
    else {
        spanpass.innerHTML = "";
        status_pass = true;

    }

    if (cpass == "") {
        spancpass.innerHTML = "** Please fill confirm password";
        status_cpass = false;
    } else if (document.getElementById('pass').value ==
        document.getElementById('cpass').value) {
        document.getElementById('cpassword').style.color = 'green';
        document.getElementById('cpassword').innerHTML = '';
        status_cpass = true;
    } else {
        document.getElementById('cpassword').style.color = 'red';
        document.getElementById('cpassword').innerHTML = 'Password not matching';
        status_cpass = false;
    }
    if (status_pass == false || status_cpass == false) {
        return false;
    }

}
pass.addEventListener("keyup", function () {
    document.getElementById("password").innerHTML = "";

});
cpass.addEventListener("keyup", function () {
    document.getElementById("cpassword").innerHTML = "";

});