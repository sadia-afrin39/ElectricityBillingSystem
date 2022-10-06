<?php
	include '../includes/header.php'; 
	if(Session::get('login')==true){
    $id = mysqli_real_escape_string($db->link,$_GET['payId']);
    $query = "UPDATE bill_detail
                SET status = 1
                    where id = $id;";
    $db->update($query);

    $sql = "SELECT bill,userId FROM bill_detail WHERE id= $id;";
    $post = $db->select($sql);
    $result = $post->fetch_assoc();
    $bill = $result['bill'];
    $userId = $result['userId'];

    $sql1 = "INSERT INTO transaction(amount,userId) VALUES('$bill','$userId')";
    $db->insert($sql1);
    header("location:../biller/showBill.php?type=my");
} ?>
