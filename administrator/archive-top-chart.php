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
            ARCHIVED UPLOADED MEDIA
          </h2>
        <caption><i class='text-danger'>ARCHIVE CHART >> </i><a href="archive-video.php" class="btn btn-primary btn-sm">MUSIC VIDEOS</a> | <a href="archive-audio.php" class="btn btn-primary btn-sm">MUSIC MP3</a> | <a href="archive-top-chart.php" class="btn btn-primary btn-sm">TOP CHART</a> | <a href="archive-news.php" class="btn btn-primary btn-sm">E! NEWS</a> | <a href="archive-events.php" class="btn btn-primary btn-sm">EVENTS</a> | <a href="archive-album.php" class="btn btn-primary btn-sm">ALBUMS</a>  </caption>
        
<br>
   <script type="text/javascript">
		function myFunction(x) {
		var r = confirm("do you want to delete?");
		if (r == true) {
			window.location.href="delet.php?id="+x;
		} 
		}
		
		function addcat(x) {
			window.location.href="add-category.php";
		}
		
		function updatecat(y) {
		var r = confirm("Do you want to edit?");
		if (r == true) {
			window.location.href="update.php?id="+y;
		} 
		}
	</script>  
</div>
<?php load_footer(); ?>