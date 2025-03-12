let auth_inputs = document.querySelectorAll(".auth_input");
let btn_submit = document.querySelector(".btn_submit");
let error_text = document.querySelector(".error_text");

const fiveDigitNumber = Math.floor(Math.random() * 90000) + 10000;
const formattedNumber = fiveDigitNumber.toString().padStart(5, '0');

console.log(formattedNumber);

btn_submit.addEventListener("click", function () {
    let arr = [];
    let data = []
    auth_inputs.forEach((element) => {
        if (element.value == "") {
            arr.push(0);
        }else{
            data.push(element.value);
        }
    });
    if (arr.length == 0 && data.length == 5) {
        error_text.innerHTML = "";
        console.log(data);
        // Convert the array into a number
        const arrayAsNumber = parseInt(data.join(''), 10);


        // Make an AJAX request
        $.ajax({
            type: "POST",
            url: "process_password_auth.php", // replace with your PHP script URL
            data: "code=" + encodeURIComponent(arrayAsNumber),
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
                            window.location.href = "reset.html";
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





        // Compare with the data variable
        // if(arrayAsNumber == formattedNumber){
        //     alert("success");
        //     window.location.href = "reset.html";
        // }else{
        //     error_text.innerHTML = "Invalid code..";
        // }
    }else{
        error_text.innerHTML = "Invalid code try again..";
    }


});

