function askReasonForContact() {
    let reason = prompt("Why are you contacting?\n1. Project\n2. Hobby");

    if (reason === "1") {
        let projectChoice = prompt("Which project(s)?\n1. Tic Tac Toe Game\n2. CGPA Calculator\n3. Matching Game\n(You can type numbers like 1,2)");
        let output = "You selected project(s): ";

        if (projectChoice.includes("1")) {
            output += "Tic Tac Toe Game ";
        }
        if (projectChoice.includes("2")) {
            output += "CGPA Calculator ";
        }
        if (projectChoice.includes("3")) {
            output += "Matching Game ";
        }

        alert(output);
    } else if (reason === "2") {
        if (hobbyChoice.includes("1")) {
            output += "Reading Books ";
        }
        if (hobbyChoice.includes("2")) {
            output += "Browsing the Internet ";
        }
        if (hobbyChoice.includes("3")) {
            output += "Learning AI Tools ";
        }

        alert(output);
    } else {
        alert("Invalid option. Please enter 1 or 2.");
    }
}




askReasonForContact();

