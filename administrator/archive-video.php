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
        <caption><i class='text-danger'>ARCHIVE VIDEOS >> </i><a href="archive-video.php" class="btn btn-primary btn-sm">MUSIC VIDEOS</a> | <a href="archive-audio.php" class="btn btn-primary btn-sm">MUSIC MP3</a> | <a href="archive-top-chart.php" class="btn btn-primary btn-sm">TOP CHART</a> | <a href="archive-news.php" class="btn btn-primary btn-sm">E! NEWS</a> | <a href="archive-events.php" class="btn btn-primary btn-sm">EVENTS</a> | <a href="archive-album.php" class="btn btn-primary btn-sm">ALBUMS</a>  </caption>
        
<br>
<div class="table-responsive" style=" margin-bottom:23%;">
            <table class="table table-striped">
              <thead>
                <tr>
                  
                  <th>User Name</th>
                  <th>Name</th>
				   <th>phone</th>
				   <th>User Email</th>
					<th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
			
			
						$qry="SELECT * FROM users ORDER BY id DESC"; 
						$result=$db->query($qry);
						if($result->num_rows>0){
							while($row = mysqli_fetch_array($result)){
								$id=$row['id'];
								$iduserdel=$row['id'];  
								$uname=$row['username'];
								$name=$row['full_name'];
								$phone=$row['phone'];
								$email=$row['email'];
								
								
echo <<< EOF
	<tr>
		<td>$uname</td> 
		<td>$name</td>
<td>$phone</td> 	
<td>$email</td>
<td style=" text-align: center;"><a href="#"> <input type="button" onclick="updateuser($id)" class="btn btn-success btn-xs" value="Restore"/></a> <a href="#"> <input onclick="myFunction($iduserdel)" type="button" class="btn btn-danger btn-xs" value="Delete"/></a></td>
	</tr>
EOF;

              }
			}
?>
              </tbody>
            </table>
          </div>

<script type="text/javascript">
		function myFunction(x) {
		var r = confirm("Are you sure you want to delete this?");
		if (r == true) {
			window.location.href="delet.php?id="+x;
		} 
	}
		function updateuser(y) {
		var r = confirm("Do you want to restore this...?");
		if (r == true) {
			window.location.href="update.php?id="+y;
		} 
	}
</script>
</div>
<?php load_footer(); ?>