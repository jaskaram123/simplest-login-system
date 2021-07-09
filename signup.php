<?php
    $success = false;
    $exists = false;
    $samepasswords = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'presets/connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $sql = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
$query = mysqli_query($conn, $sql);
$isunique = mysqli_num_rows($query);
if($isunique > 0){
    $exists = true;
}
    if($password == $cpassword && $exists == false){
        $pashash = password_hash($password, PASSWORD_DEFAULT);
        $sqlquery = "INSERT INTO `users` (`username`, `pashash`, `dateofjoin`) VALUES ('$username', '$pashash', current_timestamp())";
        $runquery = mysqli_query($conn, $sqlquery);
        $success = true;
        header("Location: login.php");
    }else if($password != $cpassword){
        $samepasswords = true;
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>sighup</title>
</head>
<body>
<?php require 'presets/navbar.php';?>
<?php

if($samepasswords == true){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Hey</strong> Passwords donot match. <a class='link' href='login.php'>RESUME CODING</a>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
if($exists == true){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Hey</strong> You have already joined the coding community. <a class='link' href='login.php'>RESUME CODING</a>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
if($success == true){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success</strong> You have joined the great coder community. LETS CODE NOW.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
?>
<div class="container my-4">
<h2>SIGNUP HERE</h2>
<form action= 'signup.php' method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name= 'username'>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name= 'password'>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name= 'cpassword'>
    <div id="emailHelp" class="form-text">We'll never ids with third parties.</div>
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</html>