<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTS:Update File</title>
    <link rel="stylesheet" href="sass/Update_File.css">
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
        <div class="progress">
            <p class="tagline">UPDATE FILE PROGRESS</p>
            <form method="POST">
                <input type="text" name="tId" id="trackingId" placeholder="Tracking Id" required>
                <div class="radio" required>
                    <input type="radio" value="Approved" name="status" id="approved">
                    <label for="status">Approved</label>
                    
                    <input type="radio" value="In Progress" name="status" id="id_progress">
                    <label for="status">In Progress</label>
                    
                    <input type="radio" value="Declined" name="status" id="declined">
                    <label for="status">Declined</label>
                </div>
                <input type="text" name="date" value="" id="date" placeholder="Date Of Update" required>
                <input type="text" name="oName" value="" id="officerName" placeholder="officer Name" required>
                <input type="text" name="msg" value="" id="msg" placeholder="Extra Info Like Reason" required>  
                
                <input type="submit" name="ufProgress" value="UPDATE">
            </form>
                <?php
                include 'connection.php';
                if(isset($_POST['ufProgress']))
                {
                    $tracking_id = $_POST['tId'];
                    $status = $_POST['status'];
                    $date = $_POST['date'];
                    $oName = $_POST['oName'];
                    $reason = $_POST['msg'];

                    $update = "update `files` set `Officer_Name` = '$oName',`Reason` = '$reason',`Date Of Update` = '$date', `Status` = '$status' where `Tracking_id` = '$tracking_id'";

                    $run_update = mysqli_query($conn, $update);
                    if($run_update)
                    {
                        ?>
                            <script>
                                alert("Recored  Updated Successful");
                            </script>
                        <?php
                    }else
                    {
                        ?>
                        <script>
                            alert("Recored Not  Update Successful");
                        </script>
                        <?php            

                    }

                }
            ?>
        </div>
    </section>
</body>
</html>