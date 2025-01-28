// Make an AJAX request
$.ajax({
    type: "POST",
    url: "process_deposit_Payment.php", // replace with your PHP script URL
    // data: { depositAmount: depositAmount },
    // data: "depositBill=" + encodeURIComponent(depositBill),
    data: form_data,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,

    success: function (responseData) {
      console.log('Response:', responseData);

      // Reset the button and status after the request is complete
      btn.show();
      status.hide().html('');

      if (responseData.status === 'info') {
        // Display information for 'info' status
        Swal.fire({
          title: responseData.title,
          text: responseData.message,
          icon: 'info',
          confirmButtonText: 'OK'
        });
      } else if (responseData.status === 'success') {
        // Handle success status
        Swal.fire({
          title: responseData.title,
          text: responseData.message,
          icon: 'success',
          confirmButtonText: 'OK'
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

      // Reset the button and status after the request is complete
      btn.show();
      status.hide().html('');
    }
  });