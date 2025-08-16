// Users database
var database = [
    {
        userName: "Anas",
        password: "1234"
    }
];

// Login prompt
var uName = prompt("Enter your username:");
var pass = prompt("Enter your password:");

function signIn(uName, pass) {
    if(uName === database[0].userName && pass === database[0].password) {
        console.log("Login successful!");

        // Get form data from URL (since method="get")
        var params = new URLSearchParams(window.location.search);

        var fname = params.get("firstname");
        var lname = params.get("lastname");
        var email = params.get("email");
        var language = params.get("language");
        var projects = params.getAll("project");
        var hobbies = params.getAll("hobby");

        console.log("First Name:", fname);
        console.log("Last Name:", lname);
        console.log("Email:", email);
        console.log("Preferred Language:", language);
        console.log("Projects:", projects.join(", "));
        console.log("Hobbies:", hobbies.join(", "));
    } else {
        console.log("Incorrect Username or Password");
    }
}

// Run sign-in
signIn(uName, pass);
