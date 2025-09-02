<?php
$message = "";
if(isset($_POST['register'])) {
    
    // Sanitize input
    $rollno = htmlspecialchars($_POST['rollno']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $fathername = htmlspecialchars($_POST['fathername']);
    $dob = $_POST['day']."-".$_POST['month']."-".$_POST['year'];
    $mobile = htmlspecialchars($_POST['mobile']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $gender = $_POST['gender'] ?? "";
    $departments = isset($_POST['department']) ? implode(", ", $_POST['department']) : "";
    $course = $_POST['course'];
    $city = htmlspecialchars($_POST['city']);
    $address = htmlspecialchars($_POST['address']);

    // Validate email
    if(!$email) {
        $message = "❌ Invalid Email Address!";
    }
    // Validate mobile
    elseif(!preg_match("/^[0-9]{10}$/", $mobile)) {
        $message = "❌ Invalid Mobile Number!";
    }
    // File upload validation
    elseif(isset($_FILES['studentphoto'])) {
        $file = $_FILES['studentphoto'];
        $filename = $file['name'];
        $filetmp = $file['tmp_name'];
        $filesize = $file['size'];
        $fileerror = $file['error'];

        $fileext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed = array('jpg','jpeg','png','gif');

        if(in_array($fileext, $allowed)) {
            if($filesize < 2 * 1024 * 1024) { // 2MB limit
                $newfilename = uniqid('', true).".".$fileext;
                $filedest = "uploads/".$newfilename;

                if(!is_dir("uploads")){
                    mkdir("uploads", 0777, true);
                }

                move_uploaded_file($filetmp, $filedest);
                $message = "✅ Registration Successful!<br> 📸 Photo uploaded: ".$newfilename."<br>";
                
                // Show user details
                $message .= "
                <h2>Student Registered Successfully!</h2>
                Roll No: $rollno <br>
                Name: $firstname $lastname <br>
                Father's Name: $fathername <br>
                DOB: $dob <br>
                Mobile: $mobile <br>
                Email: $email <br>
                Gender: $gender <br>
                Department: $departments <br>
                Course: $course <br>
                City: $city <br>
                Address: $address <br>";
            } else {
                $message = "❌ File size too large! (Max 2MB)";
            }
        } else {
            $message = "❌ Invalid file type! Only JPG, PNG, GIF allowed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="FormStyle.css">  
</head>
<body>
  <div class="form-container">
    <h1>Student Registration Form</h1>
    
    <?php if($message) { echo "<div class='message'>$message</div>"; } ?>

    <form action="" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label>Roll no. :</label>
        <input type="text" name="rollno" required>
      </div>

      <div class="form-group">
        <label>Student name :</label>
        <input type="text" name="firstname" placeholder="First Name" required>
          <span> - </span>
        <input type="text" name="lastname" placeholder="Last Name" required>
      </div>

      <div class="form-group">
        <label>Father's name :</label>
        <input type="text" name="fathername" required>
      </div>

      <div class="form-group">
        <label>Date of birth :</label>
        <input type="number" name="day" placeholder="Day" min="1" max="31" required>
        <input type="number" name="month" placeholder="Month" min="1" max="12" required>
        <input type="number" name="year" placeholder="Year" min="1980" max="2025" required>
        <label>(DD-MM-YYYY)</label>
      </div>

      <div class="form-group">
        <label>Mobile no. :</label>
        
        <input type="text" name="mobile" pattern="[0-9]{10}" placeholder="Enter 10-digit number" required>
      </div>

      <div class="form-group">
        <label>Email id :</label>
        <input type="email" name="email" required>
      </div>

      <div class="form-group">
        <label>Password :</label>
        <input type="password" name="password" minlength="6" required>
      </div>

      <div class="form-group">
        <label>Gender :</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female
      </div>

      <div class="form-group">
        <label>Department :</label>
        <input type="checkbox" name="department[]" value="CSE"> CSE
        <input type="checkbox" name="department[]" value="IT"> IT
        <input type="checkbox" name="department[]" value="ECE"> ECE
        <input type="checkbox" name="department[]" value="Civil"> Civil
        <input type="checkbox" name="department[]" value="Mech"> Mech
      </div>

      <div class="form-group">
        <label>Course :</label>
        <select name="course" required>
          <option value="">-- Select Current Course --</option>
          <option value="B.Tech">B.Tech</option>
          <option value="M.Tech">M.Tech</option>
          <option value="MBA">MBA</option>
          <option value="MCA">MCA</option>
        </select>
      </div>

      <div class="form-group">
        <label>Student photo :</label>
        <input type="file" name="studentphoto" accept="image/*" required>
      </div>

      <div class="form-group">
        <label>City :</label>
        <input type="text" name="city" required>
      </div>

      <div class="form-group">
        <label>Address :</label>
        <textarea name="address" rows="3" required></textarea>
      </div>

      <button type="submit" name="register">Register</button>
    </form>
  </div>
</body>
</html>
