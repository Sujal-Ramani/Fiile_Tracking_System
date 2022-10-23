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
    <title>FTS:New File</title>
    <link rel="stylesheet" href='sass/New_File.css'>
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
        <div class="newfile">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <p class="tagline">ADD NEW FILE</p>
                <input type="text"  name="rFrom" id="receivedFrom" placeholder="Owner Name" >
                <input type="text"  name="oName" id="officerName" placeholder="Officer Name" >
                <input type="text"  name="reason" id="subject" placeholder="Reason" >
                <input type="text"  name="color" id="color" placeholder="File Color" >
                <input type="text"  name="location" id="location" placeholder="Initial Location" >
                <input type="text"  name="date" id="date" placeholder="Date" >
                <input type="text"  name="tPages" id="Total_pages" placeholder="Total Pages" >
                <input type="text"  name="mNo" id="mobileNo" placeholder="Mobile No" >
                
                <input type="submit" name="aFile" id="addnew" value="ADD NEW">
            </form>
            <?php
                include 'connection.php';
                if(isset($_POST['aFile']))
                {
                    $rFrom = $_POST['rFrom'];
                    $oName = $_POST['oName'];
                    $reason = $_POST['reason'];
                    $color = $_POST['color'];
                    $location = $_POST['location'];
                    $date = $_POST['date'];
                    $tPages = $_POST['tPages'];
                    $mNo = $_POST['mNo'];
                    
                    // $tidstr = 
                    $tid = substr($rFrom,3).substr($oName,3).substr($mNo,5);
                    $tid = str_replace(' ', '', $tid);
                    $tid = strtoupper($tid);
                    $sql_insert = "insert into `files`(`Tracking_id`,`Owner_Name`,`Officer_Name`,`Reason`,`Colour`,`Initial_Location`,`Date`,`Pages`,`Mo.no`) values('$tid','$rFrom','$oName','$reason','$color','$location','$date','$tPages','$mNo')";
                    $res_insert = mysqli_query($conn, $sql_insert);

                    if($res_insert)
                    {
                        ?>
                            <script>
                                alert("Recored Successful Add.");
                            </script>
                        <?php
                    }else
                    {
                        ?>
                        <script>
                            alert("Recored Not Successful Add.");
                        </script>
                        <?php            

                    }

                }
            ?>
                <?php  if(!empty($tid))
                { ?>
                    <p id="trackingId">
                        <?php
                        echo $tid;
                } ?>
                </p>
        </div>
        
    </section>
</body>
</html>