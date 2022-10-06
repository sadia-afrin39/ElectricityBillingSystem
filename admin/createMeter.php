<?php
	include '../includes/header.php';
    if(Session::get('type') == 1){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userId = mysqli_real_escape_string($db->link,$_POST['userId']);
            $meterNo = mysqli_real_escape_string($db->link,$_POST['meterNo']);
        
            $sql1 = "select * from meters where meterNo='$meterNo' limit 1;";
            $metercheck= $db->select($sql1);
        
            if($userId == ""|| $meterNo == ""){
                echo "<span class='error'>Field must not be empty!!</span>";
            }else if($metercheck != false){
                    echo "<div> Meter Exist!!</div>";
            }else{
                $query = "INSERT INTO meters(userId, meterNo) VALUES('$userId','$meterNo');";
                $inserted_rows = $db->insert($query);
                header("location:meter.php");
            }
        }
        $sql= "SELECT u.id as id FROM users u LEFT JOIN meters m on u.id = m.userId 
                WHERE m.userId IS NULL; ";
        $result =$db->select($sql);
 ?>
      <div class="container">
        <h2>Create New Meter Record</h2>
        <form action="" method="POST">
          <div class="form-group">
            <label>User Id:</label>
            <select name="userId">
              <?php 
                while($row = mysqli_fetch_assoc($result)){
                  $id = $row['id'];
                  echo "<option value ='$id'>$id</option>";
                }
              ?>
            </select>
          </div>  
          <br/>      
          <div class="form-group">
            <label>Meter No:</label>
            <input type="text" class="form-control" name="meterNo">
          </div>
          <br/>
          <button type="submit" name="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
 <?php }
 include '../includes/footer.php'; ?>