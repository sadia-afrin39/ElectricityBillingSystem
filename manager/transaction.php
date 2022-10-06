<?php
include '../includes/header.php';
    if(Session::get('type') == 4 || Session::get('type') == 3){?>
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
            <a class="nav-link" href="transaction.php">Transaction Info</a>
            </li>
<?php if(Session::get('type') == 4){?>
            <li class="nav-item">
            <a class="nav-link" href="../admin/meter.php">Meter Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../admin/user.php">User Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../biller/showBill.php?type=table">Bill Info</a>
            </li>
<?php } ?>
            <li class="nav-item">
            <a class="nav-link" href="../admin/complaint.php">Complaints</a>
            </li>
        </ul>
    </div>
  </div>
</nav>
 <div class="container">
          <center><h2><u>Transaction Info</u></h2></center> <br><br>          
		  <table class="table table-striped">
		    <thead class="black">
		      <tr>
                <th>Transaction Id</th>
				<th>User Id</th>
				<th>Amount</th>
		        <th>Date</th>
		      </tr>
		    </thead>
		    <tbody>
               <?php if(Session::get('type') == 3){
                   $id = Session::get('userId');
                   $query = "SELECT * from transaction Where userId = $id;"; 
                    $post = $db->select($query);
                    if($post){
                        while($result = $post->fetch_assoc()){  
                        ?>
		    		    <tr>
                        <td><?php echo $result['id']; ?></td>
		    			<td><?php echo $result['userId']; ?></td>
						<td><?php echo $result['amount']; ?></td>
						<td><?php echo $result['date']; ?></td>
						</tr>
                <?php } } }if(Session::get('type') == 4){
                   $query = "SELECT * from transaction;"; 
                    $post = $db->select($query);
                    if($post){
                        while($result = $post->fetch_assoc()){  
                        ?>
		    		    <tr>
                        <td><?php echo $result['id']; ?></td>
		    			<td><?php echo $result['userId']; ?></td>
						<td><?php echo $result['amount']; ?></td>
						<td><?php echo $result['date']; ?></td>
						</tr>
                <?php } } } ?>
            </tbody>
          </table>
    </div>
<?php } ?>