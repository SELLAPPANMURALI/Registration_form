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
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM stu_info WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['PASSWORD'] === $password) {
            echo "<h2>Login Successful</h2>";
            // You can also start a session here and redirect to a protected page
            
        } else {
            echo "<h2>Invalid Email or password</h2>";
        }
    } else {
        echo "<h2>Invalid Email or password</h2>";
    }
}

$conn->close();
?>