let registerBtn = document.querySelector("#register");

registerBtn.addEventListener("click", function () {
    let email = document.querySelector("#email").value;
    let password = document.querySelector("#password").value;
    let error_text = document.querySelector(".error_text");

    if (email == "") {
        error_text.innerHTML = "Email is empty";
    } else if (password == "") {
        error_text.innerHTML = "Password is empty";
    } else {
        // confirm_password
        error_text.innerHTML = "";


        // Make an AJAX request
        $.ajax({
            type: "POST",
            url: "process_login.php", // replace with your PHP script URL
            data: "email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password),
            // data: form_data,
            dataType: "json",

            success: function (responseData) {
                // console.log('Response:', responseData);

                if (responseData.status === 'info') {
                    // Display information for 'info' status
                    error_text.innerHTML = responseData.message;
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
                            window.location.href = "Airdrop.php";
                        }
                    });
                } else {
                    // Handle other statuses
                    error_text.innerHTML = responseData.message;
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

