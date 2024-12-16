// Validate Registration Form
function validateRegistrationForm() {
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (username === "" || email === "" || password === "") {
        alert("All fields are required!");
        return false;
    }

    // Email validation
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true;
}

// Validate Login Form
function validateLoginForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email === "" || password === "") {
        alert("All fields are required!");
        return false;
    }

    return true;
}
