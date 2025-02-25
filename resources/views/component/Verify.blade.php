<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Verification</h3>
                        </div>
                            <div class="form-group mb-3">
                                <input id="code" type="text" required="" class="form-control" name="email" placeholder="Verification Code">
                            </div>
                            <div class="form-group mb-3">
                                <button onclick="verify()" type="submit" class="btn btn-fill-out btn-block" name="login">Confirm</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
   async function verify() {
    // Get the code from input and email from session storage
    let code = document.getElementById('code').value;
    let email = sessionStorage.getItem('email');

    // Check if the code is provided
    if (code.length === 0) {
        alert("Code Required!");
        return; // Exit the function if the code is empty
    }

    // Show the preloader
    $(".preloader").delay(90).fadeIn(100).removeClass('loaded');

    try {
        // Make the async request to verify the login
        let res = await axios.get(`/VerifyLogin/${email}/${code}`);

        // Check if the response status is 200 (success)
        if (res.status === 200) {
            // Redirect to the last location or home if none is found
            let lastLocation = sessionStorage.getItem("last_location");
            window.location.href = lastLocation ? lastLocation : "/";
        } else {
            // Hide the preloader and show failure message if status is not 200
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
            alert("Request Failed");
        }
    } catch (error) {
        // Handle any errors during the axios request
        $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        alert("Error during verification, please try again.");
        console.error(error); // Optionally log the error for debugging
    }
}

</script>

