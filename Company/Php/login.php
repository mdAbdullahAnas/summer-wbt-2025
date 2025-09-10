<?php
$userName=$password="";
$userNameErr=$passwordErr=$loginErr="";
$val1=$val2=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["userName"])) {
        $userNameErr = " User name is required";
    } else {
        $userName = test_input($_POST["userName"]);
        $val1=true;
    }

    if (empty($_POST["password"])) {
        $passwordErr = " Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $val2=true;
    }

    // Only check credentials if both fields are filled
    if($val1==true && $val2==true)
    {
        // Fixed credentials
        if($userName === "Anas" && $password === "1234") {
            $val1=$val2=false;
            header("Location:dashboard.php");
            exit();
        } else {
            $loginErr = "Invalid username or password!";
        }
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Css/login.css">
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
        <label>Login</label><br><br>
        <label for="name"> <strong>User Name: </strong></label>
            <input type="text" id="name" value="<?php echo($userName)?>" name="userName" autocomplete="off" class="form_input" style="margin_left: 10px">
            <span style="color:red;"><?php echo $userNameErr;?></span><br><br>

        <label for="password"><strong>Password: </strong></label>
            <input type="text" id="password" value="<?php echo($password)?>" name="password" autocomplete="off" class="form_input" >
            <span style="color:red;"><?php echo $passwordErr;?></span><br><br>
        <hr>
        <br>
        <input type="checkbox">Remember me
        <br><br>
        <input type="submit" name="submit">
        <a href="forgetPassword.php">Forgot Password?</a>
    </form>
    
    <footer>
        <hr>
        Copyright &copy; 2017
    </footer>

    
</body>
</html>
 