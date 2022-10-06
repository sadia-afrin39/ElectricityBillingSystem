<?php
	include '../includes/header.php';
if(Session::get('type') == 1){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = mysqli_real_escape_string($db->link,$_GET['createId']);
        $name = mysqli_real_escape_string($db->link,$_POST['name']);
        $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
        $email = mysqli_real_escape_string($db->link,$_POST['email']);
        $type = mysqli_real_escape_string($db->link,$_POST['type']);
    
        $sql = "select * from users where email='$email' limit 1;";
        $mailcheck= $db->select($sql);
        $sql1 = "select * from users where phone='$phone' limit 1;";
        $phonecheck= $db->select($sql1);
    
        if($name == "" || $phone== ""|| $email == "" || $type == ""){
            echo "<span class='error'>Field must not be empty!!</span>";
        }if($mailcheck != false){
                echo "<div'>Email Already Exist!!</div>";
        }else if($phonecheck != false){
                echo "<div>Phone Already Exist!!</div>";
        }else{
            $query = "INSERT INTO users(name, phone, email,type) VALUES('$name','$phone','$email','$type');";
            $inserted_rows = $db->insert($query);
            if($inserted_rows){
                $sql1 = "DELETE FROM new_applications WHERE id = $id;";
                $db->delete($sql1);
                header("location:user.php");
            }
        }
    }
if(isset($_GET['createId'])){
          $id = mysqli_real_escape_string($db->link,$_GET['createId']);
          $sql = "SELECT * FROM new_applications WHERE id = ?;";
          $stmt = mysqli_stmt_init($db->link);
              if(!mysqli_stmt_prepare($stmt,$sql)){
                  echo "SQL statement failed";
              }else{
                 mysqli_stmt_bind_param($stmt, "s", $id); 
                  mysqli_stmt_execute($stmt);
              }
          $row = mysqli_stmt_get_result($stmt);
          $result = mysqli_fetch_assoc($row);?>
      <div class="container">
        <h2>Create New User Record</h2>
        <form action="" method="POST">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" value="<?php echo $result['name']?>" name="name">
          </div>        
          <div class="form-group">
            <label>Phone:</label>
            <input type="text" class="form-control" value="<?php echo $result['phone']?>" name="phone">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" value="<?php echo $result['email']?>" name="email">
          </div>
          <br/>
            <div class="form-group">
            <label>Type:</label>
            <select name="type">
              <option>Select user type</option>
              <option value="1">Admin</option>
              <option value="2">Biller</option>
              <option value="3">Consumer</option>
              <option value="4">Manager</option>
            </select>
          </div>
          <br/>
          <button type="submit" name="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
 <?php } } ?>