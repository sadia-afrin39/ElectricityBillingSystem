<?php
include '../includes/header.php';
if(Session::get('type') == 1){
    if(isset($_GET['replyId'])){
        $id = mysqli_real_escape_string($db->link,$_GET['replyId']);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $reply = mysqli_real_escape_string($db->link,$_POST['reply']);
        
            if($reply == "" ){
                echo "<span class='error'>Field must not be empty!!</span>";
            }else{
                $query = "UPDATE complaint
                            SET reply = '$reply'
                             where id = $id;";
                $db->insert($query);
                header("location:complaint.php");
            }
        }
   ?>
   <form action="" method="POST">
    <center style="margin:40px;">
        <div class="form-group" >
            <label>Reply:</label>
            <textarea rows="10" cols="50" name="reply"></textarea>
        </div>        
        <button type="submit" name="submit" class="btn btn-primary">Reply</button>
    </center>
    </form>
<?php } } ?>