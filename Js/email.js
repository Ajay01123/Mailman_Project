function validation() {

    var remail = document.getElementById("remail").value;

    if (remail == "") {
        document.getElementById('spanremail').innerHTML = " ** Please fill the recovery email";
        return false;

    }

    else {
        document.getElementById('spanremail').innerHTML = "";
        return true;

    }
}
remail.addEventListener("keyup", function () {
    document.getElementById("spanremail").innerHTML = "";
});