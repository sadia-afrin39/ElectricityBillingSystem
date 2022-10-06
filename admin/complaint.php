<?php
	include '../includes/header.php'; 
	if(Session::get('type') != 2){?>
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
<?php if(Session::get('type') == 1){ ?>
           <li class="nav-item">
            <a class="nav-link" href="meter.php">Meter Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="user.php">User Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="newApplicant.php">New Applicants</a>
            </li>
<?php }if(Session::get('type') == 4){ ?>
            <li class="nav-item">
            <a class="nav-link" href="meter.php">Meter Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="user.php">User Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../biller/showBill.php?type=table">Bill Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../manager/transaction.php">Transaction Info</a>
            </li>
<?php }if(Session::get('type') == 3){?>
           <li class="nav-item">
            <a class="nav-link" href="../manager/transaction.php">Transaction Info</a>
            </li>
  <?php } ?>
			<li class="nav-item">
            <a class="nav-link" href="complaint.php">Complaints</a>
            </li>
		</ul>
    </div>
  </div>
</nav>
<div class="container">
          <center><h2><u>Complaints</u></h2></center> <br><br>          
		  <table class="table table-striped">
		    <thead class="black">
		      <tr>
		        <th>User Id</th>
            <th>Complaint</th>
			      <th>Reply</th>
				<?php if(Session::get('type') == 1){ ?>
				<th>Action</th>
				<?php } ?>
		      </tr>
		    </thead>
		    <tbody>
               <?php
                   $query = "SELECT * from complaint;"; 
                    $post = $db->select($query);
                    if($post){
                        while($result = $post->fetch_assoc()){  
                        ?>
		    		    <tr>
							<td><?php echo $result['userId']; ?></td>
							<td><?php echo $result['complaint']; ?></td>
							<td><?php echo $result['reply']; ?></td>
							<?php if(Session::get('type') == 1){ ?>
							<td><a class='btn btn-primary btn-xs'  href="reply.php?replyId=<?php echo $result['id']; ?>">Reply</a></td>
							<?php } ?>
						</tr>
                <?php
		    	     }
                }
		       ?>
		    </tbody>
      <?php if(Session::get('type') == 3){ ?>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
				    <td><a class='btn btn-primary btn-xs'  href="../consumer/createComplaint.php">Create new Complaint</a></td>
          </tr>
        </tfoot>
			<?php } ?>
      </table>
		</div>
 <?php }
 include '../includes/footer.php'; ?>