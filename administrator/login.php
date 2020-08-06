<?php
include("config.php");
include_once ('connections/functions.php');
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = md5(mysqli_real_escape_string($db,$_POST['password']));

    $res = $db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1");
    if($res->num_rows==0){
         array_push($errors, "invalid Username and password combination...");
    }
    else{
        while ($row = mysqli_fetch_assoc($res)) {
            $username = $row['username'];
            $userid = $row['id'];
            $session_id = md5(mysqli_real_escape_string($db,$_POST['password']));

            $_SESSION['user_id'] = $userid;
            $_SESSION['user_name']=$username;
            $_SESSION['ses_id']=$session_id;

            if (isset($_POST['remember'])) {                    
                $expire = time()+(60*60*24*365);
                setcookie("ucook_id",$userid,$expire);
                setcookie("ucook_name",$username,$expire);
                setcookie("cook_id",$session_id,$expire);
            }
        }                       

        header('Location: index.php');
    }
}
?>

<html>
<head>
    <title>Log In</title>
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
                <h1 style="color: skyblue; text-shadow:1px 2px 1px; text-align: center;">WELCOME TO SHEKMUSIC ADMIN PANEL</h1>
                <hr><br>
                <div class="login-panel panel panel-info" >
                    <div class="panel-heading">
                        <h2 align="center">Sign In</h2>
                    </div>
                    <div class="panel-body" style="padding: 10px 0px 0px 0px;">
                        <form method="POST" action="login.php" role="form" style="background: skyblue;  margin-left: 0px; margin-right:0px; padding: 5px; ">
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
                                    <input type="password" class="form-control" name="password"  placeholder="User Passcode" required> <br>
                                </div> 
                            </div>
                            <div class="form-group"> 
                                <div class="pull-right"> 
                                    <input type="submit" name="submit" value="Log In"> 
                                </div> 
                            </div> 
                            </fieldset>
                        </form>
                    </div>
                </div>

    </div>
</div>

</body>
</html>