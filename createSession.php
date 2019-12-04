<?php
extract($_GET);
if(isset($_GET['userId'])){
    session_start();
    $_SESSION['userId'] = $userId;
    header('Location:products.php');
}else{
    header('Location:login.html');
}
?>