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
    <title>FTS: Registration</title>
    <link rel="stylesheet" href="sass/Register.css">
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
                    <li><a href="Login.html" class="nav-drop">Log in
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
            <p class="tagline">Register</p>
            <input type="text" name="fName" id="id_firstName" placeholder="First Name" >
            <input type="text" name="lName" id="id_lastName" placeholder="Last  Name" >
            <div class="radio">
                <input type="radio" name="gender" id="id_maile">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="id_female">
                <label for="female">Female</label>
            </div>
            <input type="email" name="email" id="id_email" placeholder="someone@example.com" >
            <input type="password" name="password" id="id_password" placeholder="Create Password" >
            <input type="password" name="cpassword" id="id_cpassword" placeholder="Create Password" >
            <a href="Login.php" id="reg">Already Have An Account</a>
            <input type="submit" value="Submit" name="submit">
        </form>
        <?php
            include 'connection.php';

            if(isset($_POST['submit']))
            {
                $fName = mysqli_real_escape_string($conn,$_POST['fName']);
                $lName =  mysqli_real_escape_string($conn,$_POST['lName']);
                $gender =  mysqli_real_escape_string($conn,$_POST['gender']);
                $email =  mysqli_real_escape_string($conn,$_POST['email']);
                $password =  mysqli_real_escape_string($conn,$_POST['password']);
                $cpassword =  mysqli_real_escape_string($conn,$_POST['cpassword']);

                // $pass = password_hash($password, PASSWORD_BCRYPT);
                // $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

                $email_sql = "select * from `register` where Email = '$email'";
                $sql = mysqli_query($conn,$email_sql);
                $emailcount = mysqli_num_rows($sql);
                
                if($emailcount>0)
                {
                            ?>
                                <script>
                                    alert("Email Already Exisit");
                                </script>
                            <?php 
                }else
                {
                    if($password === $cpassword)
                    {
                        $Reg_insert = "insert into `register` (`First_Name`, `Last_Name`, `Gender`, `Email`, `Password`,`cPassword`) values ('$fName','$lName','$gender','$email','$password','$cpassword')";
                        $res_Reg = mysqli_query($conn, $Reg_insert);
                        if($res_Reg)
                        {
                            ?>
                                <script>
                                    alert("Account Register Successfully");
                                </script>
                            <?php
                        }else
                        {
                            ?>
                                <script>
                                    alert("Account Not Register Pleas Tyr Again.");
                                </script>
                            <?php   
                        }

                    }else
                    {
                            ?>
                                <script>
                                    alert("Password Not Match");
                                </script>
                            <?php 
                    }
                }

            }
            // else
            // {
            //     ?>
                        <!-- <script>
            //             alert("Problem in Submit Condition");
            //         </script> -->
                   <?php 
            // }
        ?>
    </section>
</body>
</html>