// Function to fetch user details
async function fetchUserDetails() {
    let ingamecoin = document.querySelector(".ingamecoin");
    try {
        // Make a GET request to the PHP script
        const response = await fetch(`function/php/user.php`);

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        // Parse the JSON response
        const user = await response.json();

        // Display the user details
        let ingamecoin = document.querySelector(".ingamecoin");
        let PikafiBalance = document.querySelector("#PikafiBalance");
        let miningrate = document.querySelector("#miningrate");
        if (user.error) {
            // userDetailsDiv.innerHTML = `<p>Error: ${user.error}</p>`;
            console.log(user.error)
        } else {
            ingamecoin.innerHTML = user.ingamecoin;
            PikafiBalance.innerHTML = user.balance;
            miningrate.innerHTML = user.coinPH + "/hr";
            // console.log(user);
        }
    } catch (error) {
        console.error('Error fetching user details:', error);
        console.log(error.message)
    }
}

// Call the function
fetchUserDetails();