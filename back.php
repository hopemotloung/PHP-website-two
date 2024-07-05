<?php

//connection to database
$con = mysqli_connect("localhost", "root", "123456789", "task");

if($con){
    echo " connected";
}else{
    echo "not connected";
}

//for registration
$name = $_POST['full_name'];
$email = $_POST['email'];
$age = $_POST['age'];
$race = $_POST['race'];
$height = $_POST['height'];
$dob = $_POST['dob'];
if(isset($_POST['full_name'])&& isset($_POST['email']) && isset($_POST['age']) && isset($_POST['race'])){
    $sql = "INSERT INTO info (full_name, email, age, race, height, dob) VALUES ('$name', '$email', '$age', '$race', '$height', '$dob')";
    $check = mysqli_query($con, $sql);
    if($check){
        echo " info was added to db";
        header('location: login.php');
    }else{
        echo " no info was added to db";
    }}

$password = $_POST['password'];
$email2 = $_POST['email2'];
if(isset($_POST['password']) && isset($_POST['email2'])){
    $sqll = "INSERT INTO login (password, Email) VALUES ('$password', '$email2')";
    $input = mysqli_query($con, $sqll);
    if($input){
        echo " passwords insert succesful"; 
    }else{
        echo " unable to insert";
    }
}

// //to login
// $pass = $_POST['password'];
// $emaill = $_POST['email3'];
// if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['log'])){
//     $sqll = "SELECT * FROM login WHERE password = ? AND Email = ?";
//     $stmt = mysqli_prepare($conn, $sqll);
//     mysqli_stmt_bind_param($stmt, "is", $pass, $emaill);
//     mysqli_stmt_execute($stmt);
    
    
//     $result = mysqli_stmt_get_result($stmt);
    
//     if (mysqli_num_rows($result) > 0) {
//         // Valid credentials
//         session_start();
//         $_SESSION["email3"] = $emaill;
//         echo " logged in";
//         header("Location: welcome.php");
//         exit;
//     } else {
//         // Invalid credentials
//         echo "Invalid username or password. Please try again.";
//     }
    
//     // Close the statement and database connection
//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// }



?>