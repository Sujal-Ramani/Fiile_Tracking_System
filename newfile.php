<?php

$servername="localhost";
$username="root";
$password="";
$dbname="users";

$conn=new mysqli($servername,$username,$password,$dbname);

?>
<?php

    
$query2 = "select * from newfile order by id desc limit 1";
$result2 = mysqli_query($conn,$query2);
$row = mysqli_fetch_array($result2);
$last_id = $row['id'];
if ($last_id == "")
{
    $ftsid = 1;
}
else
{
    $ftsid = substr($last_id, 9);
    $ftsid = intval($ftsid);
    $ftsid = "" .($ftsid + 1);
}
?>


<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "post") {
    $id = $_POST["id"];
    $ownername=$_POST['ownername'];
    $officername=$_POST['officername'];
    $subject=$_POST['subject'];
    $color=$_POST['color'];
    $location=$_POST['location'];
    $date=$_POST['date'];
    $totalpages=$_POST['totalpages'];
    $mobileno=$_POST['mobileno'];
    
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO newfile VALUES ('$id','$ownername','$officername',' $subject','$color',' $location',
     '$date','$totalpages','$mobileno')";
    mysqli_query($conn, $sql);


    if($conn->query($sql)==true)

    {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/5d37a6898e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTS:New File</title>
    <link rel="stylesheet" href="newfile.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <p>File Transfer<br /> System</p>
            </div>
            <div class="navigation">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="newfile.html">New File</a></li>
                    <li><a href="updatefile.html">Update File</a></li>
                    <li><a href="track.html">Track File</a></li>
                    <li><a href="About_us.html">About us</a></li>
                    <li><a href="login.html">Log in
                            <i class="fa fa-sharp fa-solid fa-caret-down"></i>
                        </a>
                        <ul>
                            <li><a href="index.html">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <section>
    <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>"  method="post">
        <div class="newfile">
            <p class="tagline">ADD NEW FILE</p>
            
            <input type="text" name="trackingid" id="trackingid" value= "3"> 
            <input type="text" name="ownername" id="receivedFrom" placeholder="Owner Name" required>
            <input type="text" name="officername" id="officerName" placeholder="Officer Name" required>
            <input type="text" name="subject" id="subject" placeholder="Reason" required>
            <input type="text" name="color" id="color" placeholder="File Color" required>
            <input type="text" name="location" id="location" placeholder="Initial Location" required>
            <input type="text" name="date" id="date" placeholder="Date" required>
            <input type="text" name="totalpages" id="Total_pages" placeholder="Total Pages" required>
            <input type="text" name="mobileno" id="mobileNo" placeholder="Mobile No" required>
            
            <button type="submit" id="addnew">ADD NEW</button>
           
        </div>
        </form> 
    </section>
</body>

</html>



