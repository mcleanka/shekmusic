<?php if (count($errors) > 0): ?>
	<div class="error">
		<!-- validation errors -->
		<?php foreach ($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach; ?>
	</div><br>
<?php endif; ?>
