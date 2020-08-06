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
        <caption><a href="video-upload.php" class="btn btn-primary btn-sm">MUSIC VIDEOS</a> | <a href="audio-upload.php" class="btn btn-primary btn-sm">MUSIC MP3</a> | <a href="hot_ten_upload.php" class="btn btn-primary btn-sm">TOP TEN CHART</a> | <a href="news-upload.php" class="btn btn-primary btn-sm">E! NEWS</a> | <a href="events-upload.php" class="btn btn-primary btn-sm">UPCOMING EVENTS</a> | <a href="album.php" class="btn btn-primary btn-sm">ALBUMS</a>  </caption>
        
<br><br>
      <h2 style="color:#006699; text-shadow:1px 2px 2px">Upload An Event</h2>
				<legend></legend>
				<div class="panel panel-default"><div class="panel-body">
				<form id= "upload_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" autocomplete="off" role="form">
					<div id="upload_area">

					<div class="form-group">
						<label for="myEvent" class="">Select Video:</label><br>
						<span class="btn btn-default btn-file col-sm-12 col-xs-12" style="border:1px #777 solid; border-radius:0;"><input type="file" name="myEvent" id="myEvent" class="btn-file col-sm-12 col-xs-12" onchange="changed()" required/></span>
					</div>

					<div class="form-group">
						<label for="title" class="">Video Name:</label><br>
						<input type="text" name="title" class="form-control" id="title" required>
					</div>

						<div class="form-group">
						<label for="sponsor" class="">Event Sponsor:</label><br>
						<input type="text" name="sponsor" class="form-control" id="sponsor" required>
					</div>

					<div class="form-group">
						<label for="description" class="">Video Description:</label><br>
						<textarea class="form-control" id="description" name="description" rows="4"></textarea>						
					</div>
					<div class="form-group">
						<label for="myPoster" class="">Choose a Video Poster:</label><br>
						<span class="btn btn-default btn-file col-sm-12 col-xs-12" style="border:1px #777 solid; border-radius:0;"><input type="file" name="myPoster" id="myPoster" class="btn-file col-sm-12 col-xs-12" onchange="changed()"/></span>
					</div>					

					<div class="form-group">
						<input type= "button" value= "Upload File" onclick= "uploadFile()" id="uploadBtn" style="margin-top:10px;" class="btn btn-success pull-right" disabled="true">
					</div>
					</div>
					<script type="text/javascript" src="js/events-uploader.js"></script>
					
				</form>

				<div id="feedback" class="text-center" style="min-height:320px;">
					<h2 style="color:#006699;font-family:Comic Sans MS;" id="progressMB"></h2>
					<center><canvas id="my_canvas" width="150" height="150"></canvas></center>
					<input class="btn btn-danger" type="button" value= "Cancel Upload" onclick= "cancelUpload()" id="cancelBtn" style="display:none;margin-top:30px;">
					<input class="btn btn-success" type="button" value= "Retry Upload" onclick= "retryUpload()" id="retry" style="display:none;margin-top:30px;">
					<div id="after_links" style="display:none;"></div>
				</div>				
				</div></div>
</div>
<?php load_footer(); ?>