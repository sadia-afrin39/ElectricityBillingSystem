<?php include '../includes/header.php';
 if(Session::get('type') == 1){?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../biller/showBill.php?type=my">See My Bill</a>
            </li>
			<li class="nav-item">
            <a class="nav-link" href="meter.php">Meter Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="user.php">User Info</a>
            </li>
			<li class="nav-item">
            <a class="nav-link" href="newApplicant.php">New Applicants</a>
            </li>
			<li class="nav-item">
            <a class="nav-link" href="complaint.php">Complaints</a>
            </li>
		</ul>
		</div>
		</div>
	</nav>
    <?php
     if(isset($_GET['deleteId'])){
        $id = mysqli_real_escape_string($db->link,$_GET['deleteId']);
        $sql1 = "DELETE FROM new_applications WHERE id = $id;";
        $db->delete($sql1);
        
       header("location:newApplicant.php");
    }?>
    <div class="container">
          <center><h2><u>New Applicants</u></h2></center> <br><br>          
		  <table class="table table-striped">
		    <thead class="black">
		      <tr>
		        <th>Name</th>
                <th>Phone</th>
		        <th>Email</th>
		        <th>Location</th>
				<th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
               <?php
                   $query = "SELECT * from new_applications;"; 
                    $post = $db->select($query);
                    if($post){
                        while($result = $post->fetch_assoc()){  
                        ?>
		    		    <tr>
		    			<td><?php echo $result['name']; ?></td>
		    			<td><?php echo $result['phone']; ?></td>
		    			<td><?php echo $result['email']; ?></td>
		    			<td><?php echo $result['location']; ?></td>
		    			<td><a class='btn btn-primary btn-xs'  href="createApplicant.php?createId=<?php echo $result['id']; ?>">Create</a>
		    				<a class='btn btn-danger btn-xs' onclick="return confirm('Are you sure to Delete?')" href="?deleteId=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>
                    <?php } } ?>
            </tbody>
		  </table>
		</div>
<?php } ?>