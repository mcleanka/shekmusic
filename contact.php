<?php
	require_once('cores/connect.php');
	require_once('cores/functions.php');
	$pgt = "Contact";
	$pg = "contact.php";
	load_header($pg, $pgt);
?>
<div class="row  container-fluid">
	<div class="row tn-section-content-wrap clearfix">
<div id="main-content" class="tn-content-wrap col-sm-8 col-xs-12" role="main"><div class="clearfix"></div>
                <div class="page-wrap clearfix">
<article id="post-2552" class="post-2552 page type-page status-publish hentry">
<h1 class="page-title-wrap"><legend>Contact Us</legend></h1>    
<div class="page-content-wrap post-content-wrap">
<p><strong>You can contact us for the reasons stated below... On How To?</strong></p>
<ul>
<li>Upload Your Songs On Our Website?</li>
<li>Donate To The Service Provider?</li>
<li>To Link With Shekmusic.com Artists?</li>
<li>Update Us On Press Release?</li>
<li>Help Us Improve Our Services?</li>
</ul>
<p><strong><em>If you have comments or any other idea among the reasons stated above, <u>Please Fill-in The Below Form</u> and Press Submit Button to send...</em></strong></p>
<div class="form-group">
<fieldset>
<form method="post" action=" " role="form"> 
<div class="form-group"> <label for="name">NAME<span class="frm_required">*</span></label> <input type="text" class="form-control" name='name' id="name"> </div>
<div class="form-group"> <label for="name">MOBILE<span class="frm_required">*</span></label> <input type="text" class="form-control" name='phone' id="name"> </div>
<div class="form-group"> <label for="name">E-MAIL<span class="frm_required">*</span></label> <input type="text" class="form-control" name='email' id="name"> </div>
<div class="form-group"> <label for="message" >MESSAGE<span class="frm_required">*</span></label> <textarea id="message" name='message' class="form-control" rows="5" style="font-size:1.2em" required></textarea> </div>
<button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button></form>
</div>
<div class="col span_1_of_3" style="margin-left:0%; margin-top:0%">
<div class="contact_info">
<legend class="frm_hidden">Find Us Here</legend>
<div class="map">
<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe><br><small><a href="" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
</div>
</div>
<small>
<div class="company_address"><p class="help-block">Shekmusic Website, Inc</p>P.O Box 303,<br>Chichiri, Blantyre 3,<br>
<p title="Phone">Phone: (+265) 885 - 63 909 1 </p>Email: <a href="mailto:shekmusic@gmail.com">shekmusic@gmail.com</a> </div> </small>               
</div>
</fieldset>
</div>
</article>
</div>
<div class="clearfix"></div>
			</div>
				<?php include_once ("includes/components/sidebar.php") ?>
		</div>
	</div>
<?php load_footer(); ?>
