<?php 
//General require Functions
    function is_logged_in(){
        global $db;
        if (isset($_SESSION['user_id'])&&isset($_SESSION['user_name'])&& isset($_SESSION['ses_id'])) {
            $username = $_SESSION['user_name'];
            $password = $_SESSION['ses_id'];
            $res = $db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
            if($res->num_rows > 0){
                return true;
            }
        }

        if(isset($_COOKIE['ucook_id']) && isset($_COOKIE['ucook_name']) && $_COOKIE['cook_id']){    
            $username = $_COOKIE['ucook_name'];
            $password = $_COOKIE['cook_id'];
            $userid = $_COOKIE['ucook_id'];

            $res = $db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
            if($res->num_rows > 0){
                $_SESSION['user_id']=$userid;
                $_SESSION['user_name']=$username;
                $_SESSION['ses_id']=$password;
                return true;
            }
        }
        return false;
    }
function load_header($title){
	return require_once 'includes/header.php';
}

function load_footer(){
	$year = date('Y');
	$foot="
    <br>
<nav class='navbar navbar-default navbar-fixed-bottom' role='navigation' style='min-height: 30px; color: black; background-image: url(images/navbar_bg.png); margin-bottom: 0px; padding: 0px; border-radius: 0px;' clearfix>
    <div class='clearfix'></div> 
        <div class='copyright pull-left'>
        	Copyright  &#169 (2017 – 2018) SHEKMusic.com  &nbsp; – All Rights Reserved
        </div>
</nav>
<a href='#' id='toTop' style='display: none;'>
	<span id='toTopHover'></span><i class='fa fa-long-arrow-up'></i></a>
</div> <!-- #tn main container -->
</div><!--#main page wrap-->
    <script type='text/javascript' src='js/photon.min.js'></script>
    <script type='text/javascript' src='js/extend-lib.js'></script>
    <script type='text/javascript' src='js/retina.min.js'></script>
    <script type='text/javascript' src='js/tn-script.min.js'></script>
    <script type='text/javascript' src='js/module-ajax.js'></script>
    <div style='clear: both;'></div>
</body><!--#body -->
</html>";	
	echo $foot;
}
//End functions

?>