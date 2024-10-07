document.addEventListener("DOMContentLoaded", function() {
    // Get the form and its elements
    const form = document.getElementById("login-form");
    const errorMsg = document.getElementById("error-msg");
    const termsCheckbox = document.getElementById("Checkbox");
    
    // Prevent form submission if the checkbox is not checked
    form.addEventListener("submit", function(event) {
        // Clear previous error message
        errorMsg.style.display = "none";
        errorMsg.innerHTML = "";

        // Check if the terms checkbox is checked
        if (!termsCheckbox.checked) {
            event.preventDefault();  // Prevent form submission
            errorMsg.style.display = "block";
            errorMsg.innerHTML = "You must agree to the Terms of Service.";
            return;
        }
        
        // If the checkbox is checked, proceed with form submission
        // Optionally, you can add further validation here for other fields
    });
});
