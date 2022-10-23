<?php

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/5d37a6898e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTS:Log in</title>
    <link rel="stylesheet" href="sass/Login.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <p>File Transfer<br /> System</p>
            </div>
            <div class="navigation">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="New_File.php">New File</a></li>
                    <li><a href="Update_File.html">Update File</a></li>
                    <li><a href="Track_File.html">Track File</a></li>
                    <li><a href="About_us.html">About us</a></li>
                    <li><a href="Login.php" class="nav-drop">Log in
                            <i class="fa fa-sharp fa-solid fa-caret-down"></i>
                        </a>
                        <ul>
                            <li><a href="Logout.php">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <p class="tagline">Login</p>
            <input type="text" placeholder="Email Id" id="id_email" name="email" required>
            <input type="password" placeholder="Enter Password" id="id_password" name="password" required>
            <a href="Register.php" id="reg">Create New Account</a>
            <input type="submit" value="Log in" name="submit">
        </form>
        <?php 
            include 'connection.php';
            if(isset($_POST['submit']))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $email_search = "select * from register where Email = '$email'";
                $query = mysqli_query($conn,$email_search);

                $email_count = mysqli_num_rows($query);

                if($email_count)
                {
                    $email_pass = mysqli_fetch_assoc($query);
                    $db_pass = $email_pass['Password'];
                    $_SESSION['username'] = $email_pass['First_Name'];
                    // $pass_decod = password_verify($password, $db_pass);
                    
                    if($db_pass === $password)
                    {
                        ?>
                        <script>
                            alert("Login Successfully");
                            location.replace("index.php");
                        </script>
                        <?php
                    }else
                    {
                        ?>
                        <script>
                            alert("Enter Valid Password");
                        </script>
                        <?php
                    }
                }else
                {
                        ?>
                        <script>
                            alert("Enter Valid Email Id ");
                        </script>
                        <?php
                }
            }
        ?>
    </section>
</body>

</html>