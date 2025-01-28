let registerBtn = document.querySelector("#register");

registerBtn.addEventListener("click", function () {
    let email = document.querySelector("#email").value;
    let username = document.querySelector("#username").value;
    let password = document.querySelector("#password").value;
    let confirm_password = document.querySelector("#confirm_password").value;
    let error_text = document.querySelector(".error_text");

    if (email == "") {
        error_text.innerHTML = "Email is empty";
    } else if (username == "") {
        error_text.innerHTML = "Username is empty";
    } else if (password == "") {
        error_text.innerHTML = "Password is empty";
    } else if (confirm_password == "") {
        error_text.innerHTML = "Confirm password is empty";
    } else if (confirm_password !== password) {
        error_text.innerHTML = "Password does not match";
    } else if (password.length < 8) {
        error_text.innerHTML = "Password is weak (must be 8 characters and above)";
    } else if (!isNaN(password)) {
        error_text.innerHTML = "Password must contain alphanumeric characters";
    } else {
        // confirm_password
        error_text.innerHTML = "";


        // Make an AJAX request
        $.ajax({
            type: "POST",
            url: "process_register.php", // replace with your PHP script URL
            data: "email=" + encodeURIComponent(email) + "&username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password) + "&confirm_password=" + encodeURIComponent(confirm_password),
            // data: form_data,
            dataType: "json",

            success: function (responseData) {
                // console.log('Response:', responseData);

                if (responseData.status === 'info') {
                    // Display information for 'info' status
                    Swal.fire({
                        title: 'Information',
                        text: responseData.message,
                        icon: 'info',
                        confirmButtonText: 'OK'
                    });
                } else if (responseData.status === 'success') {
                    // Handle success status
                    Swal.fire({
                        title: 'Success',
                        text: responseData.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Simulate a mouse click:
                            window.location.href = "login.html";
                        }
                    });
                } else {
                    // Handle other statuses
                    Swal.fire({
                        title: 'Status: ' + responseData.status,
                        text: responseData.message,
                        icon: 'info',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function (error) {
                // Display SweetAlert notification for error
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while processing your request.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });

                console.log(error);
            }
        });

    }

});

