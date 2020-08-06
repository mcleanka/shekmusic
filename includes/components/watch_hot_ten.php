<div id="main-content" class="tn-content-wrap col-sm-8 col-xs-12" role="main"><div class="clearfix"></div>
	<div id="module4-widget-8" class="widget module4-widget">
		<div class="widget-title"><h3>TOP TEN VIDEO: <?php echo $name; ?>.<?php echo $type; ?></h3></div>
	<div id="module4_5a5db758b37e1">
		<div class="module4-wrap">
<?php if(file_exists($path)): ?>
			<div class="row-fluid clearfix"><!--row fluid -->
				<div class="col-sm-12 col-xs-12">
					<div class="block4-wrap tn-block-wrap clearfix">
				<div class="block4-content">
					<div class="block4-meta-tag">
						<div class="block4-left-meta-tag">
							<ul class="post-categories"><li>Uploaded on: <?php echo $upload_on; ?></li></ul> 
						</div>
						<div class="block4-right-meta-tag"><ul class="post-meta"> <li class="comment-post-meta"><span>/</span><?php echo $gen; ?></li></ul> </div>
					</div>
				</div>

						<div class="hidden-xs">
						<div class="thumb-wrap ">
							<video src="<?php echo $path ?>" width="640px" height="360px" poster="<?php echo $poster ?>" controls style="background-color:#000" type="<?php echo $type ?>"></video>
						</div><!--#thumb wrap --></div>
						<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
						<div class="thumb-wrap ">
							<video src="<?php echo $path ?>" width="320" height="180" poster="<?php echo $poster ?>" controls style="background-color:#000" type="<?php echo $type ?>"></video>
						</div><!--#thumb wrap --></div>
						<div class="block4-content">
							<div class="block4-meta-tag">
								<div class="block4-left-meta-tag">
									<ul class="post-categories"><li>
										<?php $size = filesize($path)/1024/1024; if ($size <= 128): ?>
											<a style="margin-left:10px; width:100px;" class="btn btn-sm btn-info pull-right" href="hot_ten_downloader.php?id=<?php echo $id; ?>"><span class="fa fa-download"></span> Download</a>
										<?php endif; ?>
									</li></ul> 
								</div>
								<div class="block4-right-meta-tag"><ul class="post-meta"> <li class="comment-post-meta"><span>/</span>
									<div>
		                                <a class="btn btn-social-icon btn-facebook" src="#"><i class="fa fa-facebook"></i></a>
		                                <a class="btn btn-social-icon btn-google-plus" src="#"><i class="fa fa-google-plus"></i></a>
		                                <a class="btn btn-social-icon btn-twitter" src="#"><i class="fa fa-twitter"></i></a>
									</div>
								</li></ul> </div>
							</div>
							<p class="block-title" style="color: #777; font-size: 15px;"><?php echo $desc; ?>
								<span class='hidden-sm hidden-md hidden-lg'>
								<?php $size = filesize($path)/1024/1024; if ($size <= 128): ?>
									<a style="text-decoration: none;" class="pull-right" href="hot_ten_downloader.php?id=<?php echo $id; ?>"><span class="fa fa-download"></span></a>
								<?php endif; ?>
							</span></p></div>
						</div>
			</div>
		<?php else: ?>
			Error 404. Video Cannot Be Found
		<?php endif; ?>
		</div><!-- #row --> 
	</div><!--module 4 -->
</div> 