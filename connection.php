<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'filetrackingsystem';

    $conn = mysqli_connect($servername, $username, $password, $database);
    if($conn)
    {
        // echo 'Connection Successful';
?>
    <script>
        alert("Connection Successful");
    </script>
<?php
    }else
    {
?>
    <script>
        alert("Connection Failed");
    </script>
<?php
        die('Connection Failed' . mysqli_connect_error());
    }
?>