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
            UPLOAD MEDIA
          </h2>
        <caption><i class='text-danger'>UPLOADS STATISTICS</i> | <a href="video-upload.php" class="btn btn-primary btn-sm">MUSIC VIDEOS</a> | <a href="audio-upload.php" class="btn btn-primary btn-sm">MUSIC MP3</a> | <a href="hot_ten_upload.php" class="btn btn-primary btn-sm">TOP CHART</a> | <a href="news-upload.php" class="btn btn-primary btn-sm">E! NEWS</a> | <a href="events-upload.php" class="btn btn-primary btn-sm">EVENTS</a> | <a href="album.php" class="btn btn-primary btn-sm">ALBUMS</a>  </caption>     
<br><br>
    <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Media Category</th><th>Total Uploads</th><th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Music Audios</td><td>
       <?php
						$qry="SELECT * FROM tbl_audio ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
		?>
		<p><strong><?php echo $num_rows; ?></strong></p>
	</td><td><a href="manage-audios.php" style="color: skyblue; text-align: right;">View All</a></td>
                </tr>
                <tr>
                  <td>Music Videos</td><td>
       <?php
						$qry="SELECT * FROM tbl_video ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
		?>
		<p><strong><?php echo $num_rows; ?></strong></p>
              </td><td><a href="manage-videos.php" style="color: skyblue; text-align: center;">View All</a></td>
                </tr>
                <tr>
                  <td>Top Chart</td><td>
       <?php
						$qry="SELECT * FROM hot_ten ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
		?>
		<p><strong><?php echo $num_rows; ?></strong></p>
              </td><td><a href="manage-top-chart.php" style="color: skyblue; text-align: center;">View All</a></td>
                </tr>
                <tr>
                  <td>E! News</td><td>
       <?php
						$qry="SELECT * FROM e_news ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
		?>
		<p><strong><?php echo $num_rows; ?></strong></p>
              </td><td><a href="manage-news.php" style="color: skyblue; text-align: center;">View All</a></td>
                </tr>
                <tr>
                  <td>Events</td><td>
       <?php
						$qry="SELECT * FROM events ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
		?>
		<p><strong><?php echo $num_rows; ?></strong></p>
              </td><td><a href="manage-events.php" style="color: skyblue; text-align: center;">View All</a></td>
                </tr>
                <tr>
                  <td>Albums</td><td>
       <?php
						$qry="SELECT * FROM albums ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
		?>
		<p><strong><?php echo $num_rows; ?></strong></p>
              </td><td><a href="manage-albums.php" style="color: skyblue; text-align: center;">View All</a></td>
                </tr>
            </tbody>
            </table>
          </div>  
</div>
<?php load_footer(); ?>