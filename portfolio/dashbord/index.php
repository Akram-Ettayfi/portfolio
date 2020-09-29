

<?php
require 'database.php';

$userError="";
$passError = "";
$loginError = "";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error =false;
    $db = database::connect();
    $sql ="SELECT * FROM admin";
    $stmt = $db->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    database::disconnect();
    
    if(empty($_POST['username'])){
        $userError = "Username is required";
        $error = true;
    }
    if(empty($_POST['password'])){
        $passError = "password is required";
        $error = true;
    }
    if($error == false){
        foreach($rows as $row){ 
            if($row['username']==$username && $row['password']==$password){
                session_start();
                $_SESSION['auth']=$username;
                header('location:dashview.php');
            }
            else{
                $loginError = "Username or password is unvalid";
            }
        }
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- css style -->
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>


<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-8">
        <!-- Material form login -->
<div class="card w-75 mt-5 text-center ">

<h5 class="card-header info-color white-text text-center py-4 ">
  <strong>Login</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0 mt-3">

  <!-- Form -->
  <form class="text-center" style="color: #757575;" action="" method="POST">

    <!-- Email -->
    <div class="md-form">
    <label for="materialLoginFormEmail">Username</label>
      <input type="text" id="materialLoginFormEmail" class="form-control" name="username">
      <small id="emailHelp" class="form-text text-muted"><?=$userError?></small>

    </div>

    <!-- Password -->
    <div class="md-form">
    <label for="materialLoginFormPassword">Password</label>
      <input type="password" id="materialLoginFormPassword" class="form-control" name="password">
      <small id="emailHelp" class="form-text text-muted"><?=$passError?></small>
      <small id="emailHelp" class="form-text text-muted"><?=$loginError?></small>
    </div>

    

    <!-- Sign in button -->
    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Login</button>

   

  </form>
  <!-- Form -->

</div>

</div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

