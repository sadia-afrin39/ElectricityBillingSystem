<?php
     include '../includes/header.php';
     if(Session::get('login')==true) { ?> 
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
        <a class="nav-link" href="showBill.php?type=my">See My Bill</a>
        </li>
    <?php if(Session::get('type') == 1){?>
            <li class="nav-item">
            <a class="nav-link" href="../admin/meter.php">Meter Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../admin/user.php">User Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../admin/newApplicant.php">New Applicants</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../admin/complaint.php">Complaints</a>
            </li>
    <?php } if(Session::get('type') == 2){ ?>
        <li class="nav-item">
        <a class="nav-link" href="action.php">Calculate Bill</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="showBill.php?type=table">Bill Info</a>
        </li> 
<?php }if(Session::get('type') == 4){?>
        <li class="nav-item">
        <a class="nav-link" href="showBill.php?type=table">Bill Info</a>
        </li> 
        <li class="nav-item">
        <a class="nav-link" href="../admin/meter.php">Meter Info</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="../admin/user.php">User Info</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="../manager/transaction.php">Transaction Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../admin/complaint.php">Complaints</a>
        </li>
<?php }if(Session::get('type') == 3){ ?>
         <li class="nav-item">
        <a class="nav-link" href="../manager/transaction.php">Transaction Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../admin/complaint.php">Complaints</a>
        </li>
<?php } ?>
        </ul>
    </div>
  </div>
</nav>
<?php if(isset($_GET['type']) && $_GET['type'] == 'table'){ ?> 
<div class="container">
    <center><h2><u>Bill Info</u></h2></center> <br><br>          
    <table class="table table-striped">
    <thead class="black">
        <tr>
        <th>User Id</th>
        <th>User Name</th>
        <th>User type</th>
        <th>Unit</th>
        <th>Bill</th>
        <th>Status</th>
        <th>Month</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * from bill_detail b INNER JOIN users u ON b.userId = u.id ;"; 
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){  
                ?>
                <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['type']; ?></td>
                <td><?php echo $result['unit']; ?></td>
                <td><?php echo $result['bill']; ?></td>
                <td><?php echo $result['status']; ?></td>
                <td><?php echo $result['month']; ?></td>
                </tr>
        <?php } } ?>
    </tbody>
    </table>
</div>
<?php } if(isset($_GET['type']) && $_GET['type'] == 'my'){ ?> 
    <div class="container">
        <center><h2><u> My Bill Info</u></h2></center> <br><br>          
        <table class="table table-striped">
        <thead class="black">
            <tr>
            <th>Month</th>
            <th>Unit</th>
            <th>Bill</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                 $id = Session::get('userId');
                $query = "SELECT * from bill_detail where userId = $id ;"; 
                $post = $db->select($query);
                if($post){
                    while($result = $post->fetch_assoc()){  
                    ?>
                    <tr>
                    <td><?php echo $result['month']; ?></td>
                    <td><?php echo $result['unit']; ?></td>
                    <td><?php echo $result['bill']; ?></td>
                    <?php if($result['status']==0){ ?>
                    <td>
                    <a class='btn btn-primary btn-xs'  href="../consumer/payBill.php?payId=<?php echo $result['id']; ?>">Pay</a>
                    </td>
                    <?php }else{?>
                        <td>Paid</td>
                    <?php } ?>
                    </tr>
            <?php } } ?>
        </tbody>
        </table>
    </div> 
<?php } }?>