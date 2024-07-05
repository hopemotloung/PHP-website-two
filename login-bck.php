<?php
session_start();


$name = "root";
$pass = "123456789";
$server = "localhost";
$port = 3306;
$dbname = "task";

$conn = mysqli_connect( $server,  $name , $pass, $dbname);

if($conn)
{
  echo "db connection successful";
}
else{
    echo "db connection not successful";
    die();
}


$un = $_POST['email3'];
$pw = $_POST['password'];

// Use prepared statements to prevent SQL injection
$tsql = "SELECT Email, password FROM login WHERE Email = ? AND password = ? ";
$stmt = mysqli_prepare($conn, $tsql);
mysqli_stmt_bind_param($stmt, "si", $un, $pw);
mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // Valid credentials
    session_start();
    $_SESSION["email3"] = $un;
    header("Location: welcome.php");
    exit;
} else {
    // Invalid credentials
    echo "Invalid username or password. Please try again.";
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

?>