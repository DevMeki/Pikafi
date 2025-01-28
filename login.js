
//register user
document.querySelector(".registerBtn").addEventListener("click", function () {


    //get errorText container box
    let error = document.querySelector(".errortext");
    //get user input
    let username = document.querySelector(".username");
    let number = document.querySelector(".number");
    let pin = document.querySelector(".pin");
    let password = document.querySelector(".password");
    let re_password = document.querySelector(".re-password");
    let inviteCode = document.querySelector(".inviteCode");
    var checkboxElement = document.getElementById('checkbox');
    var checkbox = checkboxElement ? checkboxElement.checked : false;
    let gender = document.querySelector(".gender");

    //validate user input
    if (username.value == "") {
        error.innerHTML = "Enter a valid Username.";
    } else if (number.value == "") {
        error.innerHTML = "Enter a valid Phone Number.";
    } else if (pin.value == "") {
        error.innerHTML = "Enter a valid withdrawal Pin.";
    } else if (password.value == "") {
        error.innerHTML = "Enter a valid Password.";
    } else if (re_password.value == "") {
        error.innerHTML = "Confirm your Password.";
    } else if (re_password.value !== password.value) {
        error.innerHTML = "Your password do not Match.";
    } else if (inviteCode.value == "") {
        error.innerHTML = "Enter a valid Invitation Code.";
    } else if (!checkbox) {
        error.innerHTML = "Agree to our Terms and Conditions.";
    } else {
        let data = "username=" + encodeURIComponent(username.value) + "&number=" + encodeURIComponent(number.value) + "&pin=" + encodeURIComponent(pin.value) + "&password=" + encodeURIComponent(password.value) + "&inviteCode=" + encodeURIComponent(inviteCode.value) + "&gender=" + encodeURIComponent(gender.value);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "process_sign_up.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                // Handle success
                var return_data = JSON.parse(xmlhttp.responseText);
                if (return_data.status === "success") {
                    error.innerHTML = "";
                    document.querySelector(".succestext").innerHTML = return_data.message;
                    //clear user data
                    username.value = "";
                    number.value = "";
                    pin.value = "";
                    password.value = "";
                    re_password.value = "";
                    inviteCode.value = "";
                    // Redirect to dashboard.php on success
                    window.location.replace("../user/dashboard.php");
                } else {
                    error.innerHTML = return_data.message;
                }
            } else {
                console.log("Error parsing JSON:", return_data);
            }
        }
        xmlhttp.send(data);

    }

});
