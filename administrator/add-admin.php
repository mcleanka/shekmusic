
<?php 
require_once('connections/connect.php');
require_once('connections/functions.php');
require_once 'includes/header.php';

/* 
	<<<<<<<< GETTING DATA FROM THE FORM WHEN THE SUBMIT BUTTON IS CLICKED >>>>>>
*/
	if (isset($_POST['submit'])){
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		
	/*
		 <<<<<<< CONTROLLING THE FLOW OF DATA CAPTURED FROM THE FORM >>>>>>
	*/
		$check = $db->query("SELECT username FROM admin WHERE username='$username'");
		//checking if username exists...
		if($check->num_rows > 0){
			array_push($errors, "Sorry! Username already taken ... Try another one!");
		}
		//Varifying passwords >>>>>>>
		else{
							// if there are no errors , save the user to database
								$password = md5($password); //encrpt passwords before storing data into database (security)
								$query = "INSERT INTO admin VALUES ('id','$username','$password')";
								$db->query($query) or die($query);
								$_SESSION['new_user'] = $username;
								$_SESSION['success'] = "Admin was successfully added... ";
								// <<<<<<< Redirecting user to LogIn page after registring >>>>>>>>
								//header('Location: add-admin.php');
								}
							}
	?> 
<html>
<head>
    <title>Add Admin </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/mystyles.css" rel="stylesheet">
</head>
<body>
<style type="text/css">
    body{
        background: #fff;
    }
</style>
<div class='container-fluid'>
    <div class='row'>
        <div class="col-sm-12 col-xs-12" >
    <div class="contents" style="margin-top: 90px; margin-left:0px;">
            <div class="col-sm-6 col-xs-12 col-sm-offset-3">
                <h1 style="color: skyblue; text-shadow:1px 2px 1px; text-align: center;">ADD ADMIN AS A MEMBER</h1>
                <hr><br>
                <div class="login-panel panel panel-info" >
                    <div class="panel-heading">
                        <h2 align="center">SIGN UP</h2>
                    </div>
                    <div class="panel-body" style="padding: 10px 0px 0px 0px;">
                        <form method="POST" action="add-admin.php" role="form" style="background: skyblue;  margin-left: 0px; margin-right:0px; padding: 5px; ">
                            <fieldset>
            <!-- validation errors -->
<?php include_once ('includes/errors.php'); ?>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="error success">
                    <p>
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                         ?>
                    </p>
                </div>
            <?php endif ?>
                            <div class="form-group">
                                <div class="col-sm-12"> 
                                    <input type="text" class="form-control" name="username"  placeholder="Username" required> <br>
                                </div> 
                            <div class="form-group">
                                <div class="col-sm-12"> 
                                    <input type="text" class="form-control" name="password"  placeholder="User Passcode" required> <br>
                                </div> 
                            </div>
                            <div class="form-group"> 
                                <div class="pull-right"> 
                                    <input type="submit" name="submit" value="Done"> 
                                </div> 
                            </div> 
                            </fieldset>
                        </form>
                    </div>

         <div class="cate-page-title-wrap tn-category-5" style='padding:0; margin:0px;'>
          <h1 class="cate-title"> <a href="index.php" class='text-left'>< < Back Home</a> <a href="logout.php" style='margin-left: 394px;'>Log Out > ></a></h1>
        </div>
                </div>

    </div>
</div>

</body>
</html>