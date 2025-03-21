let upgrade = document.querySelectorAll("#upgrade");

upgrade.forEach(element => {
    element.addEventListener("click", function () {
        // alert(element.value);

        // Make an AJAX request
        $.ajax({
            type: "POST",
            url: "function/php/miners.php", // replace with your PHP script URL
            data: "miner=" + encodeURIComponent(element.value),
            // data: form_data,
            dataType: "json",

            success: function (responseData) {
                // console.log('Response:', responseData);

                if (responseData.status === 'success') {
                    // Handle success status
                    Swal.fire({
                        title: 'Success',
                        text: responseData.message,
                        icon: 'success',
                        confirmButtonText: 'Continue',
                        allowOutsideClick: false, // Prevents closing by clicking outside
                        allowEscapeKey: false // Prevents closing by pressing Escape
                    }).then((result) => {
                        //reload the page
                        location.reload();
                    });
                } else {
                    // Handle other statuses
                    error_text.innerHTML = responseData.message;
                    // Handle success status
                    Swal.fire({
                        title: 'Error!',
                        text: responseData.message,
                        icon: 'error',
                        confirmButtonText: 'ok',
                        allowOutsideClick: false, // Prevents closing by clicking outside
                        allowEscapeKey: false // Prevents closing by pressing Escape
                    }).then((result) => {
                        //reload the page
                        location.reload();
                    });
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

    });
});