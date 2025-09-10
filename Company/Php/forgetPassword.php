



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
    <body>
        
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>Forgot Password</label><br><br>
        <label for="name"> <strong>Enter Email: </strong></label>
            <input type="email" id="name"  name="userName" autocomplete="off" class="form_input" style="margin_left: 10px">
            <span style="color:red;"></span><br><br>

        
        <hr>
        
        <br>
        <input type="submit" name="submit">
    </form>

    </body>
    <footer>
        <hr>
        Copyright &copy; 2017
    </footer>

    
</body>
</html>
