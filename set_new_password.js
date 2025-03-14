let resetBtn = document.querySelector("#resetBtn");
let confirmPassword = document.querySelector("#confirm");
let password = document.querySelector("#password");
let error = document.querySelector(".error");

resetBtn.addEventListener("click", function () {

    if(password.value == ""){
        error.innerHTML = "Password is empty";
    }else if(confirmPassword.value == ""){
        error.innerHTML = "Confirm password is empty";
    }else if (password.value !== confirmPassword.value) {
        error.innerHTML = "Password does not match";
    }else if (password.value.length < 8) {
        error.innerHTML = "Password is weak (must be 8 characters and above)";
    }else if (!isNaN(password.value)) {
        error.innerHTML = "Password must contain alphanumeric characters";
    }else{

        // Make an AJAX request
        $.ajax({
            type: "POST",
            url: "process_new_password.php", // replace with your PHP script URL
            data: "password=" + encodeURIComponent(password.value) + "&confirm=" + encodeURIComponent(confirmPassword.value),
            // data: form_data,
            dataType: "json",

            success: function (responseData) {
                // console.log('Response:', responseData);

                if (responseData.status === 'info') {
                    // Display information for 'info' status
                    error.innerHTML = responseData.message;
                } else if (responseData.status === 'success') {
                    // Handle success status
                    Swal.fire({
                        title: 'Success',
                        text: responseData.message,
                        icon: 'success',
                        confirmButtonText: 'Continue',
                        allowOutsideClick: false, // Prevents closing by clicking outside
                        allowEscapeKey: false // Prevents closing by pressing Escape
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Simulate a mouse click:
                            window.location.href = "login.php";
                        }
                    });
                } else {
                    // Handle other statuses
                    error.innerHTML = responseData.message;
                }
            },
            error: function (error) {
                // Display SweetAlert notification for error
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while processing your request.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false, // Prevents closing by clicking outside
                    allowEscapeKey: false // Prevents closing by pressing Escape
                });

                console.log(error);
            }
        });
    }

});

