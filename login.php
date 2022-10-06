<?php include "includes/Session.php";
Session::checkLogin();
?>
<?php include "includes/config.php";?>
<?php include "includes/Database.php";?>
<?php include "includes/Format.php";?>

<?php
    $db = new Database();
    $fm = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <style>
        .error{
            color: red;
            font-size: 18px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
        <?php 
            if(isset($_GET['request']) && $_GET['request'] == 'done'){
                echo "Request Sent to the admin panel. Please wait for their confirmation.";
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $fm->validation($_POST['email']);            
                $phone = $fm->validation($_POST['phone']);   
                
                $email = mysqli_real_escape_string($db->link,$email);
                $phone = mysqli_real_escape_string($db->link,$phone);
                $query = "select * from users where email = '$email' and phone = '$phone';";
                $result = $db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set("login",true);
                    Session::set("userId",$value['id']);
                    Session::set("userName",$value['name']);
                    Session::set("type",$value['type']);
                    header("Location:index.php");
                }else{
                    echo "<span class='error'>Username or Password not matched!!</span>";
                }
            }
        ?>
		<form action="login.php" method="post">
			<h1>Login</h1>
			<div>
				<input type="email" placeholder="Email" required="" name="email"/>
			</div>
			<div>
				<input type="text" placeholder="Phone" required="" name="phone"/>
			</div>
			<div>
				<input type="submit" value="Login" />
			</div>
		</form><!-- form -->
        <div class="button">
			<a href="new.php">New Applicant?</a>
		</div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>