<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tarin's EBS</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- Font Awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styleformfillup.css">
  </head>
  <body>
      <?php
      	include 'includes/Database.php';
          include "includes/Format.php";
          include "includes/config.php";
          $db = new Database();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userName = mysqli_real_escape_string($db->link,$_POST['userName']);
            $email = mysqli_real_escape_string($db->link,$_POST['email']);
            $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
            $location = mysqli_real_escape_string($db->link,$_POST['location']);
        
            $sql = "select * from users where email='$email' limit 1;";
            $mailcheck= $db->select($sql);
            $sql1 = "select * from users where phone='$phone' limit 1;";
            $phonecheck= $db->select($sql1);
        
            if($userName == "" || $phone== ""|| $email == "" || $location == ""){
                echo "<span class='error'>Field must not be empty!!</span>";
            }if($mailcheck != false){
                    echo "<div'>Email Already Exist!!</div>";
            }else if($phonecheck != false){
                    echo "<div>Phone Already Exist!!</div>";
            }else{
                $query = "INSERT INTO new_applications(name, phone, email,location) VALUES('$userName','$phone','$email','$location');";
                $inserted_rows = $db->insert($query);
                header("location:login.php?request=done");
            }
        }
      ?>
  <div class="card container" style="width:70%;">
        <form class="row g-3" method="POST">
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputAddress" name="userName">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputAddress" name="phone">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress2" name="location">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Make Request</button>
            </div>
        </form>
      </div>
  </body>
</html>
