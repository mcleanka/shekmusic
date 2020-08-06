<?php
require_once('connections/connect.php');
require_once('connections/functions.php');
  if (!is_logged_in()) {
    header("Location: login.php");
  }
  require_once('includes/header.php');
require_once('includes/mobile_mainnav.php');
require_once('includes/mainnav.php');
include_once 'nav-sidebar.php';
?><br>
        <div class="col-sm-8 col-xs-12 main" >
          <h2 class="page-header">
            WELCOME TO ADMIN PANEL
          </h2>
          <div class="row placeholders">
            <div class="hidden-xs col-sm-3 placeholder text-center">
              <a class="btn icon-btn btn-info" href="manage-uploads.php">
                <span class="glyphicon btn-glyphicon glyphicon-search img-circle text-info"></span> 
                <?php include('index.dat'); ?> Total Uploads
                </a>
            </div>
             <div class="hidden-xs col-sm-3 placeholder text-center">
              <a class="btn icon-btn btn-info" href="#">
                <span class="glyphicon btn-glyphicon fa fa-eye img-circle text-info"></span>
                <?php include('index.dat'); ?> Total Views
                </a>
            </div>
            <div class="hidden-xs col-sm-3 placeholder text-center">
                    <a class="btn icon-btn btn-info" href="#">
          <span class="glyphicon btn-glyphicon fa fa-gear img-circle text-info"></span>Settings
        </a>  
            </div>
             <div class="hidden-xs col-sm-3 placeholder text-center">
              <a class="btn icon-btn btn-info" href="http://shekmusic.com">
                <span class="glyphicon btn-glyphicon glyphicon-home img-circle text-info"></span>
                Main site
                </a>
            </div>
            <div class="col-xs-12 hidden-sm hidden-md hidden-lg placeholder text-center">
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
            </div>
             <div class="col-xs-1 col-sm-1 placeholder text-center">
                <!-- spacer --> 
            </div>
            <!-- set up database -->
            <div class="col-xs-6 col-sm-3 placeholder text-center">

        <div style="margin-top:10px;">

        </div>
            </div>

          </div>
          <hr>
            <div class="cate-page-title-wrap tn-category-5" style='padding:0; margin:0px;'>
            <div class="cate-description">
              <p >SHEKMUSIC SITE STATISTICS</p>
            </div>
          <h1 class="cate-title">You can go though the admin panels by navigating the sidebar...!</h1>
        </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Web page</th>
                  <th>Number of Visits</th>
                  <th>Last Visit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Home</td>
                  <td><?php include('index.dat'); ?></td>
                  <td><?php include('index-time.dat'); ?></td>
                </tr>
                <tr>
                  <td>Music</td>
                  <td><?php include('music.dat'); ?></td>
                  <td><?php include('music-time.dat'); ?></td>
                </tr>
                <tr>
                  <td>Music Videos</td>
                  <td><?php include('video.dat'); ?></td>
                  <td><?php include('music-time.dat'); ?></td>
                </tr>
                <tr>
                  <td>E! News</td>
                  <td><?php include('news.dat'); ?></td>
                  <td><?php include('news-time.dat'); ?></td>
                </tr>
                <tr>
                  <td>Events</td>
                  <td><?php include('events.dat'); ?></td>
                  <td><?php include('events-time.dat'); ?></td>
                </tr>
                <tr>
                  <td>Contacts</td>
                  <td><?php include('contact.dat'); ?></td>
                  <td><?php include('contact-time.dat'); ?></td>
                </tr>
                <tr>
                  <td>About Us</td>
                  <td><?php include('about.dat'); ?></td>
                  <td><?php include('about-time.dat'); ?></td>
                </tr>
                <tr>
                  <td>All Visitors</td>
                  <td><?php include('index.dat'); ?></td>
                  <td><?php include('index-time.dat'); ?></td>
                </tr>
            </tbody>
            </table>
          </div> <br>     
      </div>
<?php load_footer(); ?>