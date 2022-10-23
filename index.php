<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/5d37a6898e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTS:Home Page</title>
    <link rel="stylesheet" href="sass/style.css">
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
        <div class="mainBox">
            <div class="heading">
                <p class="headline">trace your file <br /><?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="mainContent">
                <div class="main">
                    <input type="text" id="tracking_id" name="searchId" placeholder="Enter Tracking id" required>
                    <input type="submit" value="track" id="btn" name="searchIdbtn">
                </div>
            </div>
        </div>
    </section>
</body>

</html>