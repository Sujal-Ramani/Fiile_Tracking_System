<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/5d37a6898e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTS:Track File</title>
    <link rel="stylesheet" href="sass/Track_File.css">
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
                    <li><a href="Update_File.php">Update File</a></li>
                    <li><a href="Track_File.php">Track File</a></li>
                    <li><a href="About_us.php">About us</a></li>
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
                <p class="headline">trace your file</p>
            </div>
            <div class="mainContent">
                <div class="main">
                    <form method="POST">
                        <input type="text" name="tId" id="tId" placeholder="Enter Tracking id">
                        <input type="submit" name ="tFilebtn" value="track" id="btn1">
                    </form>
                    <p>
                    <?php
                        include 'connection.php'; 
                        if(isset($_POST['tFilebtn']))
                        {
                            $tracking_id = $_POST['tId'];
                            $search_file = "select * from `files` where Tracking_id = '$tracking_id'";
                            $search = mysqli_query($conn,$search_file);
                            $res = mysqli_fetch_array($search);
                        }
                    ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="info">
                <p class="tagline">File Details</p>
                <p><b>Owner Name :</b> <?php echo $res['Owner_Name']; ?></p>
                <p><b>Officer Name :</b> <?php echo $res['Officer_Name']; ?></p>
                <p><b>File Color :</b> <?php echo $res['Colour']; ?></p>
                <p><b>Mobile No :</b> <?php echo $res['Mo.no']; ?></p>
            </div>
            <div class="status">
                <p class="tagline">File Status</p>
                <p><b>Status :</b> <?php echo $res['Status']; ?></p>
                <p><b>Date of Update :</b> <?php echo $res['Date Of Update']; ?></p>
                <p><b>Last Update by :</b> <?php echo $res['Officer_Name']; ?></p>
            </div>
        </div>
        <div class="result">
            <img src="sass/images/2.jpg" alt="">
            <div class="keypoint">
                <p class="tagline">Work Reason</p>
                <span id="reason"><?php echo $res['Reason']; ?></span>
            </div>
            <div class="path">
            </div>
        </div>
    </section>
</body>
</html>