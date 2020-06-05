<?php

  require('header.inc.php');
  $errormsg=' ';
  $deptname = ' ';
  $deptid = '';
if(isset($_GET['id'])){
    $deptid = mysqli_real_escape_string($connection,$_GET['id']);
    $getDept = mysqli_query($connection,"SELECT * FROM DEPARTMENT WHERE id = '$deptid'");
    $dept = mysqli_fetch_assoc($getDept);
    $deptname = $dept['department'];
}
 if(isset($_POST['department'])){
     $deptname = mysqli_real_escape_string($connection,$_POST['department']);
     if($deptid>0){
       mysqli_query($connection,"UPDATE DEPARTMENT SET department='$deptname' WHERE id='$deptid'");
       header('location:index.php');
     }else{
     mysqli_query($connection,"INSERT INTO DEPARTMENT (department) VALUES ('$deptname') ");
     header('location:index.php');
       
     }
    
 }
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Department</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
								<label for="department" class=" form-control-label">Department Name</label>
								<input type="text" value="<?php echo $deptname; ?>" name="department" placeholder="Enter your department name" class="form-control" required></div>
							   
							   <button  type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
                               <div class="result_msg"><?php echo $errormsg; ?></div>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>