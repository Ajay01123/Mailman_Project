
function validation() {

    var fname = document.getElementById('fname');

    var lname = document.getElementById("lname").value;
    var user = document.getElementById("user").value;
    var email = document.getElementById("email").value;
    var remail = document.getElementById("remail").value;
    var pass = document.getElementById("pass").value;
    //var dub = pass;
    var cpass = document.getElementById("cpass").value;
    var agreement = document.getElementById("agreement");
    // //create span id variable 
    var spanname = document.getElementById("txtname");
    var spanlast = document.getElementById("lastname")
    var spanuser = document.getElementById("username");
    var spanemail = document.getElementById("useremail");
    var spanremail = document.getElementById("recovery");
    var spanpass = document.getElementById("password");
    var spancpass = document.getElementById("cpassword");
    var fileimage = document.getElementById('image');
    var filePath = fileimage.value;
    var allowedExtenstion = /(\.jpg|\.jpeg|\.png)$/i;
    var status_name;
    var status_last;
    var status_user;
    var status_email;
    var status_remail;
    var status_pass;
    var status_image;
    var space = /^\S+$/;
    var regex = /^[a-zA-Z0-9]*$/;
    var regex_email = /^[\w.+\-]+@mailman\.com$/;
    var pattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
    var email_pattern = /^[\w.+\-]+@gmail\.com$/
    var email_check = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    if (fname.value == "") {
        spanname.innerHTML = " Should be mandatory";
        status_name = false;

    }
    else if (fname.value.match(regex)) {
        spanname.innerHTML = "";
        status_name = true;
    }
    else {
        spanname.innerHTML = "Should be not special characters allowed ";
        status_name = false;
    }
    if (lname == "") {
        spanlast.innerHTML = " Please fill the last name";
        status_last = false;
    } else if (testWhiteSpace(lname) == true) {
        spanlast.innerHTML = "Space not a llowd";
        status_last = false;
    }

    else {
        spanlast.innerHTML = "";
        status_last = true;
    }
    if (user == "") {
        spanuser.innerHTML = " ** Please fill the user name";
        status_user = false;
    } else if (user.match(regex)) {
        spanuser.innerHTML = "";
        status_user = true;
    } else {
        spanuser.innerHTML = " ** No special characters allowed";
        status_user = false;
    }
    if (email == "") {
        spanemail.innerHTML = "Please enter your E-Mail address!";
        status_email = false;

    } else if (testWhiteSpace(email) == true) {
        spanemail.innerHTML = "Please remove space";
        status_email = false;
    }
    else if (email.search(regex_email) || email.search(email_check)) {
        spanemail.innerHTML = "Please correct email";
        status_email = false;

    }

    else {
        spanemail.innerHTML = "";
        status_email = true;

    }

    if (remail == "") {
        spanremail.innerHTML = "** Please fill the recovery email";
        status_remail = false;

    } else if (testWhiteSpace(remail) == true) {

        spanremail.innerHTML = "Please remove space";
        status_remail = false;

    } else if (remail.search(email_check)) {
        spanremail.innerHTML = "Please fill valid email";
        status_remail = false;
    }
    else {

        spanremail.innerHTML = "";
        status_remail = true;
    }


    if (pass == "") {
        spanpass.innerHTML = " ** Please fill the password";
        status_pass = false;
    } else if (pass.length < 6) {
        spanpass.innerHTML = "**Password length must be atleast 6 characters";
        status_pass = false;
    }
    else if (pass.search(pattern) == -1) {
        spanpass.innerHTML = "one upper case and lower case and digit and special character";
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
        document.getElementById('cpassword').innerHTML = 'not matching';
        status_cpass = false;
    }
    if (!allowedExtenstion.exec(filePath)) {
        status_image = true;
        fileimage.value = "";


    } else {
        document.getElementById("InpImg").innerHTML = "";
        status_image = false;
        if (fileimage.files && fileimage.files[0]) {

            var Reader = new FileReader();
            Reader.onload = function (e) {
                const element = document.getElementById("default-preview");
                element.remove();
                document.getElementById("imgpreview").innerHTML = '<img src="' + e.target.result + '" width="150px">';
                //console.log('imgpreview');

            }
            Reader.readAsDataURL(fileimage.files[0])

            var image = document.getElementById('image');
            var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
            if (size > 2) {
                document.getElementById("InpImg").innerHTML = "please select less then 2MB size";
                status_image = false;

            }
            else {
                document.getElementById("InpImg").innerHTML = "";
                status_image = true;
            }
        }

    }
    if (!agreement.checked) {
        document.getElementById("agree").innerHTML = "";
        return false;


    }
    if (status_name == false || status_last == false || status_user == false || status_email == false || status_remail == false || status_pass == false || status_cpass == false || status_remail == false || status_image == false) {
        return false;
    }
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

}
function testWhiteSpace(string) {
    // return s.includes(' ');
    return string && / /.test(string) ? true : false
}
function escapeRegex(string) {
    return string && (/^[\w.+\-]+@mailman\.com$/);
}


fname.addEventListener("keyup", function () {
    document.getElementById("txtname").innerHTML = "";

});
lname.addEventListener("keyup", function () {
    document.getElementById("lastname").innerHTML = "";

});
user.addEventListener("keyup", function () {
    document.getElementById("username").innerHTML = "";

});
email.addEventListener("keyup", function () {
    document.getElementById("useremail").innerHTML = "";

});
remail.addEventListener("keyup", function () {
    document.getElementById("recovery").innerHTML = "";

});
pass.addEventListener("keyup", function () {
    document.getElementById("password").innerHTML = "";

});
cpass.addEventListener("keyup", function () {
    document.getElementById("cpassword").innerHTML = "";

});
//console.log("hsjdsjfsdjf");



