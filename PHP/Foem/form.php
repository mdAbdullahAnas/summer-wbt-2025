<?php
// Initialize variables
$firstname = $lastname = $email = $language = $reason = "";
$projects = $hobbies = $discussion = [];
$errors = [];

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate First Name
    if (empty($_POST["firstname"])) {
        $errors['firstname'] = "First Name is required";
    } else {
        $firstname = htmlspecialchars(trim($_POST["firstname"]));
    }

    // Validate Last Name
    if (empty($_POST["lastname"])) {
        $errors['lastname'] = "Last Name is required";
    } else {
        $lastname = htmlspecialchars(trim($_POST["lastname"]));
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // Validate Language
    if (empty($_POST["language"])) {
        $errors['language'] = "Please select a language";
    } else {
        $language = $_POST["language"];
    }

    // Validate Reason for Contact
    if (empty($_POST["reason"])) {
        $errors['reason'] = "Please select a reason for contact";
    } else {
        $reason = $_POST["reason"];
    }

    // Projects (checkboxes, optional)
    if (!empty($_POST["project"])) {
        $projects = $_POST["project"];
    }

    // Hobbies (checkboxes, optional)
    if (!empty($_POST["hobby"])) {
        $hobbies = $_POST["hobby"];
    }

    // Discussion Topics (checkboxes, required)
    if (empty($_POST["discussion"])) {
        $errors['discussion'] = "Please select at least one discussion topic";
    } else {
        $discussion = $_POST["discussion"];
    }

    // If no errors, process the form (for now, just display data)
    if (empty($errors)) {
        echo "<h2>Form Submitted Successfully!</h2>";
        echo "<p><strong>Name:</strong> $firstname $lastname</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Preferred Language:</strong> $language</p>";
        echo "<p><strong>Reason for Contact:</strong> $reason</p>";
        echo "<p><strong>Projects:</strong> " . implode(", ", $projects) . "</p>";
        echo "<p><strong>Hobbies:</strong> " . implode(", ", $hobbies) . "</p>";
        echo "<p><strong>Discussion Topics:</strong> " . implode(", ", $discussion) . "</p>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="../wbt/css/style.css">
    <link rel="stylesheet" href="../wbt/css/form.css">
</head>
<body>
    <div class="form-section">
        <h2>To Contact Me, Please Provide Your Information</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <!-- Name Fields -->
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="firstname" value="<?php echo $firstname; ?>">
            <span class="error"><?php echo $errors['firstname'] ?? ''; ?></span>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lastname" value="<?php echo $lastname; ?>">
            <span class="error"><?php echo $errors['lastname'] ?? ''; ?></span>

            <!-- Email -->
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $errors['email'] ?? ''; ?></span>

            <!-- Language Radio Buttons -->
            <p><strong>Preferred Language:</strong></p>
            <span class="radio-group">
                <input type="radio" id="bangla" name="language" value="Bangla" <?php if($language=="Bangla") echo "checked"; ?>>
                <label for="bangla">Bangla</label>

                <input type="radio" id="english" name="language" value="English" <?php if($language=="English") echo "checked"; ?>>
                <label for="english">English</label>
            </span>
            <span class="error"><?php echo $errors['language'] ?? ''; ?></span>

            <!-- Reason for Contact -->
            <label for="reason">Why do you want to contact me?</label>
            <select id="reason" name="reason">
                <option value="">--Select--</option>
                <option value="Job" <?php if($reason=="Job") echo "selected"; ?>>Job</option>
                <option value="Internship" <?php if($reason=="Internship") echo "selected"; ?>>Internship</option>
                <option value="Interview" <?php if($reason=="Interview") echo "selected"; ?>>Interview</option>
            </select>
            <span class="error"><?php echo $errors['reason'] ?? ''; ?></span>

            <!-- Project Checklist -->
            <p><strong>Projects:</strong></p>
            <div class="checkbox-group">
                <?php
                $projectOptions = ["Tic Tac Toe Game", "Cgpa Calculator", "Matching Game"];
                foreach ($projectOptions as $p) {
                    $checked = in_array($p, $projects) ? "checked" : "";
                    echo "<label><input type='checkbox' name='project[]' value='$p' $checked> $p</label>";
                }
                ?>
            </div>

            <!-- Hobbies Checklist -->
            <p><strong>Hobbies:</strong></p>
            <div class="checkbox-group">
                <?php
                $hobbyOptions = ["Reading Books", "Browsing Net", "Learning AI Tools"];
                foreach ($hobbyOptions as $h) {
                    $checked = in_array($h, $hobbies) ? "checked" : "";
                    echo "<label><input type='checkbox' name='hobby[]' value='$h' $checked> $h</label>";
                }
                ?>
            </div>

            <!-- Discussion Topics -->
            <p><strong>What should be discussed?</strong></p>
            <div class="checkbox-group">
                <?php
                $discussionOptions = ["Project", "Education", "Background"];
                foreach ($discussionOptions as $d) {
                    $checked = in_array($d, $discussion) ? "checked" : "";
                    echo "<label><input type='checkbox' name='discussion[]' value='$d' $checked> $d</label>";
                }
                ?>
            </div>
            <span class="error"><?php echo $errors['discussion'] ?? ''; ?></span>

            <!-- Buttons -->
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </div>
</body>
</html>
