
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Css/viewProfile.css">
</head>
<body>
    <header>
        <div>
             <img src="../Image/Xlogo.png" alt="logo">
             <h1>Company</h1>
        </div>
        <div>
             <label > Log in as </label>
            <a href="">Bob</a>
            <a href="Login.php">Logout</a>
        </div>
    </header>
    <hr>
    <div class="first">
        <h2><p><strong>Account</strong></p></h2>
        <hr>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="viewProfile.php">View Profile</a></li>
            <li><a href="editProfile.php">Edit Profile</a></li>
            <li><a href="changeProfilePicture.php">Change Profile Picture</a></li>
            <li><a href="changePassword.php">Change Password</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
        
    </div>

    <div class="second">

        <form action="editProfile.php">
            <h2>Profile</h2>
            <div class="row">
                <label class="info">Name:</label>
                <label class="data">Bob</label>
            </div>
            <hr>
            <div class="row">
                <label class="info">Email:</label>
                <label class="data">bob@gmail.com</label>
            </div>
            <hr>
            <div class="row">
                <label class="info">Gender:</label>
                <label class="data">Male</label>
            </div>
            <hr>
            <div class="row">
                <label class="info">Date of Birth:</label>
                <label class="data">19/05/2005</label>
            </div>
            <a href="dashboard.php">Change</a>

            <hr>

            <div class="row">
                <input type="submit" value="Edit Profile">
            </div>
            <br><br>

 



            
        </form>
        
        
    </div>

    
    <footer>
        <hr>
        Copyright &copy; 2017
    </footer>

    
</body>
</html>