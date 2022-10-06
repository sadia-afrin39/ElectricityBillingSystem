<?php
	include '../includes/header.php';
    if(Session::get('type') == 1){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = mysqli_real_escape_string($db->link,$_GET['updateId']);
            $userId = mysqli_real_escape_string($db->link,$_POST['userId']);
            $meterNo = mysqli_real_escape_string($db->link,$_POST['meterNo']);
        
            $sql = "select * from meters where userId='$userId'  and id != $id limit 1;";
            $usercheck= $db->select($sql);
            $sql1 = "select * from meters where meterNo='$meterNo'  and id != $id limit 1;";
            $metercheck= $db->select($sql1);
        
            if($userId == ""|| $meterNo == ""){
                echo "<span class='error'>Field must not be empty!!</span>";
            }if($usercheck != false){
                    echo "<div'>User Already has given meter no!!</div>";
            }else if($metercheck != false){
                    echo "<div> Meter Exist!!</div>";
            }else{
                $query ="UPDATE meters 
                SET userId='$userId', meterNo='$meterNo'
                WHERE id = '$id';"; 
                $db->update($query);
                header("location:meter.php");
            }
        }

        if(isset($_GET['updateId'])){
            $id = mysqli_real_escape_string($db->link,$_GET['updateId']);
            $sql = "SELECT * FROM meters WHERE id = ?;";
            $stmt = mysqli_stmt_init($db->link);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    echo "SQL statement failed";
                }else{
                   mysqli_stmt_bind_param($stmt, "s", $id); 
                    mysqli_stmt_execute($stmt);
                }
            $row = mysqli_stmt_get_result($stmt);
            $result = mysqli_fetch_assoc($row);
 ?>
      <div class="container">
        <h2>Update Meter Record</h2>
        <form action="" method="POST">
          <div class="form-group">
            <label>User Id:</label>
            <input type="number" class="form-control" value="<?php  echo $result['userId']; ?>"  name="userId">
          </div>        
          <div class="form-group">
            <label>Meter No:</label>
            <input type="text" class="form-control"  value="<?php  echo $result['meterNo']; ?>" name="meterNo">
          </div>
          <br/>
          <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
 <?php } }
 include '../includes/footer.php'; ?>