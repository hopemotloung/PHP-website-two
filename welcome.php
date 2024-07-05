<?php
session_start();
$name = "root";
$pass = "123456789";
$server = "localhost";
$port = 3306;
$dbname = "task";

$conn = mysqli_connect( $server,  $name , $pass, $dbname);
$email = $_SESSION["email3"];

$stmt = $conn->prepare("SELECT full_name, email, age, race, height, dob password FROM  info WHERE email = ?
");
$stmt->bind_param("s", $email);
$stmt->execute();

$results = $stmt->get_result();
$row = $results->fetch_assoc();
if($results->num_rows > 0){
    // echo "found";
   
}

$stmt->close();

//to log out
if(isset($_POST['logout'])){
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>welcome</title>
</head>
<body>
    <h1>Welcome back <?php echo $row["full_name"]?></h1>
        <div class="info">
            <h3>Account details</h3>
            <hr>
            <ul>
                <li>Name: <?php echo $row["full_name"]?></li>
                <!-- <li>Date Of Birth: <?php echo $row["dob"]?></li> -->
                <li>Email: <?php echo $row["email"]?></li>
                <li>Age: <?php echo $row["age"]?></li>
                <li>Height: <?php echo $row["height"]?>M</li>
                <li>Race: <?php echo $row["race"]?></li>
            </ul>
        </div>
<div>
<form action="welcome.php" method="post">
            <input type="Submit" name="logout" value="Log Out">
        </form>
</div>
        


    <script src="java.js"></script>
</body>
</html>