<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM siswa WHERE id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location: siswa.php');
    }else{
        die(mysqli_error($con));
    }
}

?>