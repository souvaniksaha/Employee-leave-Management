<?php
  
  require('db.inc.php');

  if(isset($_POST['email']) && isset($_POST['password'])){
    
     $error_msg='';
      //getting form data
      $email = mysqli_real_escape_string($connection, $_POST['email']);
      $password = mysqli_real_escape_string($connection, $_POST['password']);
       
      //getting entered user info from db
      $res = mysqli_query($connection,"SELECT * FROM employee WHERE email='$email' AND password='$password'");

      //count the number of row

      $count = mysqli_num_rows($res);

      if($count > 0){
        //fetching the row into an array
        $result = mysqli_fetch_assoc($res);
        //Put the value into the session
         $_SESSION['ROLE'] = $result['role'];
         $_SESSION['USER_ID'] = $result['id'];
         $_SESSION['USER_NAME'] = $result['name'];
         //redirect to index.php
         header('location:index.php');
         die;
      }else 
       $error_msg = 'Entered email or password is incorrect!';
  }


?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					 <div class="result_msg"><?php echo $error_msg; ?></div>
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>