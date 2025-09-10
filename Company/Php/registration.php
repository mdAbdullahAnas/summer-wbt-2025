<?php
$name=$email=$userName=$password=$confpassword=$gender=$dob="";
$nameErr=$emailErr=$userNameErr=$passwordErr=$confpasswordErr=$genderErr=$dobErr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["userName"])){
        $nameErr="Name is required";
    }else{
        $name=test_input($_POST["userName"]);
    }

    if(empty($_POST["email"])){
        $emailErr="Email is required";
    }else{
        $email=test_input($_POST["email"]);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailErr="Invalid email format";
        }
    }

    if(empty($_POST["username"])){
        $userNameErr="Username is required";
    }else{
        $userName=test_input($_POST["username"]);
    }

    if(empty($_POST["password"])){
        $passwordErr="Password is required";
    }else{
        $password=test_input($_POST["password"]);
    }

    if(empty($_POST["confpassword"])){
        $confpasswordErr="Please confirm your password";
    }else{
        $confpassword=test_input($_POST["confpassword"]);
        if($password!==$confpassword){
            $confpasswordErr="Passwords do not match";
        }
    }

    if(empty($_POST["gender"])){
        $genderErr="Gender is required";
    }else{
        $gender=test_input($_POST["gender"]);
    }

    if(empty($_POST["day"])||empty($_POST["month"])||empty($_POST["year"])){
        $dobErr="Date of Birth is required";
    }else{
        $dob=$_POST["day"]."/".$_POST["month"]."/".$_POST["year"];
        if(!checkdate($_POST["month"],$_POST["day"],$_POST["year"])){
            $dobErr="Invalid Date of Birth";
        }
    }

    if($nameErr==""&&$emailErr==""&&$userNameErr==""&&$passwordErr==""&&$confpasswordErr==""&&$genderErr==""&&$dobErr==""){
        header("Location: dashboard.php");
        exit;
    }
}

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Css/registration.css">
</head>
<body>
    <header>
        <div>
            <img src="../Image/Xlogo.png" alt="logo">
            <h1>Company</h1>
        </div>
        <div>
            <a href="../index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="registration.php">Registration</a>
        </div>
    </header>
    <hr>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label><strong>Registration</strong></label><br><br>

        <div class="form_middle">
            <label for="name">Name:</label>
            <input type="text" id="name" value="<?php echo $name?>" name="userName" autocomplete="off" style="width:350px;"><br>
            <span style="color:red;"><?php echo $nameErr;?></span>
            <hr>
        </div>

        <div class="form_middle">
            <label for="email">Email:</label>
            <input type="email" id="email" value="<?php echo $email?>" name="email" autocomplete="off" style="width:350px;"><br>
            <span style="color:red;"><?php echo $emailErr;?></span>
            <hr>
        </div>

        <div class="form_middle">
            <label>User Name:</label>
            <input type="text" name="username" value="<?php echo $userName?>" style="width:350px;"><br>
            <span style="color:red;"><?php echo $userNameErr;?></span>
            <hr>
        </div>

        <div class="form_middle">
            <label>Password:</label>
            <input type="password" name="password" style="width:350px;"><br>
            <span style="color:red;"><?php echo $passwordErr;?></span>
            <hr>
        </div>

        <div class="form_middle">
            <label>Confirm Password:</label>
            <input type="password" name="confpassword" style="width:350px;"><br>
            <span style="color:red;"><?php echo $confpasswordErr;?></span>
            <hr>
        </div>

        <div class="form_middle" id="val">
            <label>Gender</label><br>
            <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked";?>>Male
            <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked";?>>Female
            <input type="radio" name="gender" value="Other" <?php if($gender=="Other") echo "checked";?>>Other
            <span style="color:red;"><?php echo $genderErr;?></span>
        </div>
        <hr>

        <div class="form_middle" id="val">
            <label>Date of Birth</label><br>
            <input type="text" name="day" style="width:50px;" value="<?php echo isset($_POST['day'])?$_POST['day']:''?>"> /
            <input type="text" name="month" style="width:50px;" value="<?php echo isset($_POST['month'])?$_POST['month']:''?>"> /
            <input type="text" name="year" style="width:80px;" value="<?php echo isset($_POST['year'])?$_POST['year']:''?>"> (dd/mm/yyyy)
            <span style="color:red;"><?php echo $dobErr;?></span>
        </div>

        <br>
        <input type="submit">
        <input type="reset">
        <a href="forgotpass.php">Forgot Password?</a>
    </form>

    <footer>
        <hr>
        Copyright &copy; 2017
    </footer>
</body>
</html>