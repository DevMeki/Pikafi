let email = document.querySelector("#email");
let error_text = document.querySelector(".error_text");
let btn_submit = document.querySelector(".btn_submit");

btn_submit.addEventListener("click", function () {

    if (email.value == "") {
        error_text.innerHTML = "Enter a Valid Email...";
    } else {
        function validateEmail(email_data) {
            const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return regex.test(email_data.toLowerCase());
        }

        if (validateEmail(email.value)) {
            error_text.innerHTML = "";


            const fiveDigitNumber = Math.floor(Math.random() * 90000) + 10000;
            const formattedNumber = fiveDigitNumber.toString().padStart(5, '0');

            // Make an AJAX request
            $.ajax({
                type: "POST",
                url: "process_forgot_password.php", // replace with your PHP script URL
                data: "email=" + encodeURIComponent(email.value) + "&code=" + encodeURIComponent(formattedNumber),
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
                                window.location.href = "password_auth.html";
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

        } else {
            error_text.innerHTML = "Invalid Email...";
        }
    }

});