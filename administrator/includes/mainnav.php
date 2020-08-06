<div class="tn-main-container">
<header class="clearfix">
<!-- logo -->
<div class="tn-container clearfix">
<!-- main nav -->
<nav id="mainnav" class='navbar navbar-inverse navbar-fixed-top' style='background-image: url(images/navbar_bg.png); border-radius: 0px; color: #fff; border:none;'>
<div class='container-fluid' style='width:100%; '>
    <div class="site-logo" role="banner">
        <a itemprop="url" href=".">
            <img data-no-retina="" src="images/mainlogon.jpg" alt="SHEKMUSIC.COM"></a>
        <meta itemprop="name" content="SHEKMusic.com">
        </div><!-- #logo -->
    <ul class='nav navbar-nav navbar-right' style='margin-top: 20px'>
        <div class="mobile-menu-nav pull-right">
            <a href="#" id="mobile-button-nav-open" class="mobile-nav-button"><i class="menu-button fa fa-th"></i></a>
        </div><!-- #mobile nav wrap -->
        <div id="menu-main" class="menu-my-menu-container">
            <ul id="menu-my-menu" class="menu">
                <li class="menu-item menu-item-type-custom" style="margin-right:300px;">
              <a class="btn icon-btn btn-info" href="#">
                <span class="glyphicon btn-glyphicon glyphicon-user img-circle text-info"></span>
                 logged in as: <?php
//user or admin details....
  $userid = $_SESSION['user_id'];
  $query = "SELECT * FROM admin WHERE id=$userid";
  $check = $db->query($query) or die($query);
  while ($row = mysqli_fetch_assoc($check)) {
    $username   = $row['username'];
  }
  echo $username; 
?>
              </a>
                </li>
                <li class="menu-item menu-item-type-custom"><a href="add-admin.php">Add Admin</a></li>
                <li class="menu-item menu-item-type-post_type"><a href="logout.php">Sign out</a></li>
    </div><!--#main nav inner -->
</ul>
</div>
</nav>
<!-- #main header -->
</div><!--#tn container -->
<div id="main-wrapper" class="tn-container">       
</header>
<div class="row  container-fluid">
<div class="row main-content-wrap tn-section-content-wrap clearfix">