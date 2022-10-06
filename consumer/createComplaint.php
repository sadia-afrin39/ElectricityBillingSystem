<?php
include '../includes/header.php';
if(Session::get('type') == 3){
    $id = Session::get('userId'); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $complaint = mysqli_real_escape_string($db->link,$_POST['complaint']);
    
        if($complaint == "" ){
            echo "<span class='error'>Field must not be empty!!</span>";
        }else{
            $query = "INSERT INTO complaint(userId,complaint) VALUES('$id','$complaint')";
            $db->insert($query);
            header("location:../admin/complaint.php");
        }
    }
?>
<form action="" method="POST">
<center style="margin:40px;">
    <div class="form-group" >
        <label>Make Complaint:</label>
        <textarea rows="10" cols="50" name="complaint"></textarea>
    </div>        
    <button type="submit" name="submit" class="btn btn-primary">Create</button>
</center>
</form>
<?php } ?>