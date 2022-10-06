<?php
     include '../includes/header.php';
    if(Session::get('type') == 2){ 

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userId = mysqli_real_escape_string($db->link,$_POST['userId']);
        $unit = mysqli_real_escape_string($db->link,$_POST['unit']);
        $month = mysqli_real_escape_string($db->link,$_POST['month']);

        $sql= "SELECT * FROM bill_detail Where userId = '$userId' AND month = '$month';";
        $usercheck= $db->select($sql);
    
        function BillCalculate($watt){
            $unit = $watt;
            $bill = 0;
            if ($watt > 500){
                $bill += ($watt - 500) * 7;
                $watt = 500;
            }
            if( $watt > 300 && $watt <= 500){
                $bill += ($watt - 300) * 5;
                $watt = 300;
            }
            if($watt > 100 && $watt <= 300){
                $bill += ($watt - 100) * 4;
                $watt = 100;
            }
            if($watt <= 100){
                $bill += $watt * 3.5;
            }
            
            if($unit < 500){
                $bill += $bill * 0.05;
            }
            if($unit >= 500){
                $bill += $bill * 0.1;
            }
            return $bill + 50;
        }

        $bill = BillCalculate($unit);
      
        if($usercheck != false){
          echo "<div'>Already bill calculated for this user of this month!!</div>";
        }else{
          $query = "INSERT INTO bill_detail(userId, unit, bill, month) VALUES('$userId','$unit','$bill','$month');";
          $inserted_rows = $db->insert($query);
          if($inserted_rows){
            header('Location:showBill.php?type=table');
          }
        }
      }

      $sql= "SELECT * FROM meters";
        $result =$db->select($sql);
    ?>
        <div class="container">
        <h2>Calculate Bill</h2>
        <form action="" method="POST">
          <div class="form-group">
            <label>ConusmerId:</label>
            <select name="userId">
            <?php 
                while($row = mysqli_fetch_assoc($result)){
                  $id = $row['userId'];
                  echo "<option value ='$id'>$id</option>";
                }
              ?>
            </select>
          </div>   
          <br/>     
          <div class="form-group">
            <label>Unit Usage:</label>
            <input type="number" class="form-control" name="unit">
          </div>
          <br/>
          <div class="form-group">
            <label>Month:</label>
            <select name="month">
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option valu="November">November</option>
              <option value="December">December</option>
            </select>
          </div>
          <br/>
          <button type="submit" name="submit" class="btn btn-primary">Calculate</button>
        </form>
      </div>
   
   <?php } ?>
