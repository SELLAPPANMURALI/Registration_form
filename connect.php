<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_connect";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $address = $_POST["address"];
    $email = $_POST["email"];  
    $password=$_POST["password"];    
    $mobile = $_POST["mobile"];
    $course = $_POST["course"];

    $sql = "INSERT INTO stu_info (FNAME, LNAME, ADDRESS, EMAIL,PASSWORD, MOBILE, COURSE) VALUES ('$fname', '$lname', '$address', '$email','$password', '$mobile', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo"Registration Successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>