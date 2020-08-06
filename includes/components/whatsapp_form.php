<aside id="module-post-widget-15" class="sidebar-widget widget module-post-widget">
	<div class="widget-title"><h3>Let's Talk on WhatsApp</h3></div>
		<div id="moduleP_5a5db7590632a">
			<div class="module-post-wrap">
				<fieldset>
					<form method="post" action="index.php" role="form" id="reg_form">
						<style type="text/css">
.error {
  width: 100%;
  margin: 0px auto;
  padding: 10px;
  border: 1px solid #a94442;
  color: #a94442;
  background: #e5e5e5;
  border-radius: 5px;
  text-align: left;
}
.success{
  width: 100%;
  margin: 0px auto;
  color: #3c763d;
  padding: 10px;
  background: #dff0d8;
  border: 1px solid #3c763d;
  border-radius: 5px;
  text-align: left;
}

						</style>
<?php
	if (isset($_POST['submit'])){
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$genre = mysqli_real_escape_string($db, $_POST['genre']);
		$password= mysqli_real_escape_string($db, $_POST['password_1']);
		$password2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$join_on = date("Y-m-d"); // getting date when user has joined the website
		
	/*
		 <<<<<<< CONTROLLING THE FLOW OF DATA CAPTURED FROM THE FORM >>>>>>
	*/
		$check = $db->query("SELECT username FROM users WHERE username='$username'");
		//checking if username exists...
		if($check->num_rows > 0){
			array_push($errors, "Sorry! Username already taken ... Try another one!");
		}
		//Varifying passwords >>>>>>>
		else{
			if ($password!=$password2) {
				array_push($errors, "Your artist names donot match!");
			}
			else{
				//Checking if all of the fields have been field in
				if ($fname&&$username&&$phone&&$email&&$genre&&$password&&$password2) {
						if (strlen($username) > 25 || strlen($fname) > 25) {
							echo "The maximum limit for username/full name is 25 characters!";
						}
						else {
							if (strlen($password) > 30 || strlen($password) < 5) {
								echo "Your password must be between 5 and 30 characters long!";
							}
							else {
							// if there are no errors , save the user to database
								$password = md5($password); //encrpt passwords before storing data into database (security)
								$password2 =md5($password2);
								$query = "INSERT INTO users VALUES ('','$username','$fname','$phone','$email','$genre','$password','$join_on','0')";
								$db->query($query) or die($query);
								$_SESSION['new_user'] = $username;
								$_SESSION['success'] = "Account created successfully! Please signin to continue... ";
								// <<<<<<< Redirecting user to LogIn page after registring >>>>>>>>
								//header('Location: index.php');
								}
							}
				}
				else {
					array_push($errors, "Please fill in all of the fields");
				}
			}
		}
	}
?>
						<div class="form-group"> <label for="fname">NAME<span class="frm_required">*</span></label> <input placeholder="Full name" type="text" class="form-control" id="fname" name="fname" value="<?php echo (isset($_POST['fname']) ? $_POST['fname'] : '');?>"> </div>

						<div class="form-group"> <label for="username">USERNAME<span class="frm_required">*</span></label> <input placeholder="Full name" type="text" class="form-control" id="username" name="username" value="<?php echo (isset($_POST['username']) ? $_POST['username'] : '');?>"> </div>
						
						<div class="form-group"> <label for="email">E-MAIL<span class="frm_required">*</span></label> <input placeholder="E-mail account" type="text" class="form-control" id="email" name="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : '');?>"> </div>
					
						<div class="form-group"> <label for="phone">MOBILE<span class="frm_required">*</span></label> <input placeholder="Whatsapp phone number" type="text" class="form-control" id="phone" name="phone" value="<?php echo (isset($_POST['phone']) ? $_POST['phone'] : '');?>"> </div>
						
						<div class="form-group">
							<label class="control-label" for="selectDistrict">District<span class="frm_required">*</span></label>
							<div class="form-group">
							<select name="genre" id="genre" class="form-control">
							<option value="Balaka">Balaka</option><option value="Blantyre">Blantyre</option><option value="Chikwawa">Chikwawa</option><option value="Chiradzulu">Chiradzulu</option><option value="Chitipa">Chitipa</option><option value="Dedza">Dedza</option><option value="Dowa">Dowa</option><option value="Karonga">Karonga</option><option value="Kasungu">Kasungu</option><option value="Likoma">Likoma</option><option value="Lilongwe">Lilongwe</option><option value="Machinga">Machinga</option><option value="Mangochi">Mangochi</option><option value="Mchinji">Mchinji</option><option value="Mulanje">Mulanje</option><option value="Mwanza">Mwanza</option><option value="Mzimba">Mzimba</option><option value="Neno">Neno</option><option value="Nkhata Bay">Nkhata Bay</option><option value="Nkhotakota">Nkhotakota</option><option value="Nsanje">Nsanje</option><option value="Ntcheu">Ntcheu</option><option value="Ntchisi">Ntchisi</option><option value="Phalombe">Phalombe</option><option value="Rumphi">Rumphi</option><option value="Salima">Salima</option><option value="Thyolo">Thyolo</option><option value="Zomba">Zomba</option><option value="Other Country">OTHER COUNTRY (Mention below)</option></select></div>
						</div>
						<div class="form-group"> <label for="purpose">My Purpose<span class="frm_required">*</span></label> <input placeholder="Why joining the group?" type="text" class="form-control" id="purpose" name="purpose" value="<?php echo (isset($_POST['purpose']) ? $_POST['purpose'] : '');?>"> </div>

						<div class="form-group"> 
							<div class="text-right"> 
								<button type="submit" id="submit" class="btn btn-success" name="submit">Submit</button> 
							</div>
						</div>
					</fieldset>
			</form>
		</div>
	</div><!-- #row -->
</aside>