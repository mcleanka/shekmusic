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
        <caption><i class='text-danger'>TOTAL HOT CHART >> </i> <a href="manage-videos.php" class="btn btn-primary btn-sm">MUSIC VIDEOS</a> | <a href="manage-audio.php" class="btn btn-primary btn-sm">MUSIC MP3</a> | <a href="manage-top-charts.php" class="btn btn-primary btn-sm">TOP CHART</a> | <a href="manage-news.php" class="btn btn-primary btn-sm">E! NEWS</a> | <a href="manage-events.php" class="btn btn-primary btn-sm">EVENTS</a> | <a href="manage-album.php" class="btn btn-primary btn-sm">ALBUMS</a>  </caption>
        
<br>
    <?php 
    					$qry="SELECT * FROM hot_ten ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
?>
<br>
   <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Music Title ... [Total videos:<b class='text-success'> <?php echo $num_rows; ?></b> ]</th><th>Artist/Producer</th><th>Genre Type</th><th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php
while ($row = mysqli_fetch_array($result)){
                  $id=$row['id'];
                $iduserdel=$row['id'];
  $name = strlen($row['title']) > 30 ? substr($row['title'], 0,30).'...' : $row['title'];
  $prod = $row['producer'];
  $gen  = $row['genre'];
  $upload_on  = date('jS F, Y', strtotime($row['created_on']));
  echo <<< EOF
                  <tr>
                  <td><i> $name</i></td><td>$prod</td><td> $gen </td><td style=" text-align: center;"><a href="#"> <input type="button" onclick="updateuser($id)" class="btn btn-success btn-xs" value="Play mp4"/></a> <a href="#"> <input onclick="myFunction($iduserdel)" type="button" class="btn btn-danger btn-xs" value="Delete"/></a></td>
                </tr>
EOF;
}
?>
            </tbody>
            </table>
          </div> 
  <script type="text/javascript">
    function myFunction(x) {
    var r = confirm("Are you sure you want to delete this music Permanently?");
    if (r == true) {
      window.location.href="delete-chart.php?id="+x;
    } 
  }
    function updateuser(y) {
    var r = confirm("Do you want to Play this Song...?");
    if (r == true) {
      window.location.href="watch-chart.php?id="+y;
    } 
  }
</script>   
</div>
<?php load_footer(); ?>