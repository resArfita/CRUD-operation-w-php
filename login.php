<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $db_host='localhost';
    $db_user='root';
    $db_pass='';
    $db_name='ex2';

    $conn = new mysqli ($db_host,$db_user,$db_pass,$db_name);
    if($conn->connect_error){
        die('connect failed' . $conn->connect_error);
    }

    $username=$_POST['username'];
    $password=$_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
    $result = $conn->query($query);
    if($result->num_row=1){
        header('location: dashboard/index.php');
    }else{
        echo 'invalid username/password';
    }
    $conn->close();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <input type="submit" class="btn btn-primary" value="Login" name="submit">
        </form>

    </div>

 </body>
</html>