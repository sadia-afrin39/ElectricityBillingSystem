<?php
include '../includes/header.php';
if(Session::get('type') == 1){
    if(isset($_GET['deleteId'])){
    $id = mysqli_real_escape_string($db->link,$_GET['deleteId']);
    $sql1 = "DELETE FROM meters WHERE id = $id;";
    $db->delete($sql1);
    
   header("location:meter.php");
   }
}
?>