<?php
    $success = false;
    $exists = false;
    $islogin = true;
    $match = true;
    $true = true;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'presets/connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
    $query = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($query);
    if($num == 1){
      $data = mysqli_fetch_array($query);
    $pass = $data['pashash'];
    $correct = password_verify($password, $pass);
    if($correct == true){
      $islogin = true;
      session_start();
      $_SESSION['isloggedin'] = true;
      $_SESSION['username'] = $username;
      header('Location: welcome.php');
    }if($correct == false){
      $match = false;
  }
    }
    
    else{
        $islogin = false;
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

    <title>login</title>
</head>
<body>
<?php require 'presets/navbar.php';?>
<?php

if($match == false){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Hey</strong> YOUR PASSWORD IS INCORRECT.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
if($islogin == false){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Hey</strong> You haven't joined our community.  <a class='link' href='signup.php'>JOIN NOW</a>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
?>
<div class="container my-4">
<h2>LOGIN HERE</h2>
<form action= 'login.php' method="post" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name= 'username'>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name= 'password'>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</html>