<?php 
require_once('connections/functions.php');
require_once('connections/connect.php');
require_once('includes/header.php');
require_once('includes/mobile_mainnav.php');
require_once('includes/mainnav.php');
?> <br>
<?php
    include_once 'nav-sidebar.php';
?>
<div class="col-sm-8 col-xs-12 main" >
          <h2 class="page-header">
            MANAGE MEDIA UPLOADS
          </h2>
        <caption><i class='text-danger'>DELETE / EDIT >> </i> <a href="manage-videos.php" class="btn btn-primary btn-sm">MUSIC VIDEOS</a> | <a href="manage-audio.php" class="btn btn-primary btn-sm">MUSIC MP3</a> | <a href="manage-top-charts.php" class="btn btn-primary btn-sm">TOP CHART</a> | <a href="manage-news.php" class="btn btn-primary btn-sm">E! NEWS</a> | <a href="manage-events.php" class="btn btn-primary btn-sm">EVENTS</a> | <a href="manage-album.php" class="btn btn-primary btn-sm">ALBUMS</a>  </caption>
        
<br>
      
</div>
<?php load_footer(); ?>