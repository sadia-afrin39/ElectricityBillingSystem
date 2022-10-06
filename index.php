<?php
	include 'includes/header.php';
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
    }?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="biller/showBill.php?type=my">See My Bill</a>
            </li>
   <?php if(Session::get('type') == 1){
?>
            <li class="nav-item">
            <a class="nav-link" href="admin/meter.php">Meter Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin/user.php">User Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin/newApplicant.php">New Applicants</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin/complaint.php">Complaints</a>
            </li>
<?php
 }if(Session::get('type') == 2){?>
            <li class="nav-item">
            <a class="nav-link" href="biller/showBill.php?type=table">Bill Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="biller/action.php">Calculate Bill</a>
            </li>
 <?php } if(Session::get('type') == 3){?>
            <li class="nav-item">
            <a class="nav-link" href="manager/transaction.php?type=my">Transaction Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin/complaint.php">Complaints</a>
            </li>
 <?php } if(Session::get('type') == 4){?>
            <li class="nav-item">
            <a class="nav-link" href="admin/meter.php">Meter Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin/user.php">User Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="biller/showBill.php?type=table">Bill Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="manager/transaction.php">Transaction Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin/complaint.php">Complaints</a>
            </li>
 <?php }?>
            <li class="nav-item">
                <a class="nav-link"  href="?action=logout">Logout</a>
            </li>
        </ul>
    </div>
  </div>
</nav>
<div class="container" style="margin:40px;">
    <center>
        <h2>Hello <?php echo Session::get('userName'); ?></h2>
    </center>
</div>
<?php
	include 'includes/footer.php';
?>