<?php
extract($_GET);
if(isset($_GET['userId']) && isset($_GET['roleId'])){
    session_start();
    $_SESSION['userId'] = $userId;
    $_SESSION['roleId'] = $roleId;
    header('Location:products.php');
}else{
    header('Location:login.html');
}
?>