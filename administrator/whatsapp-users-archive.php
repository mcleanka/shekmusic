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
            ARCHIVED WHATSAPP USERS
          </h2>
    <?php 
    					$qry="SELECT * FROM users ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
?>
                <div class="cate-page-title-wrap tn-category-5" style='padding:0; margin:0px;'>
          <h1 class="cate-title">Total archived whatsapp users overview: <?php echo $num_rows;?></h1>
        </div> 
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
<td style=" text-align: center;"><a href="#"> <input type="button" onclick="updateuser($id)" class="btn btn-success btn-xs" value="Activate"/></a> <a href="#"> <input onclick="myFunction($iduserdel)" type="button" class="btn btn-danger btn-xs" value="Delete"/></a></td>
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
		var r = confirm("Are you sure you want to delete this user Permanently?");
		if (r == true) {
			window.location.href="delet.php?id="+x;
		} 
	}
		function updateuser(y) {
		var r = confirm("Do you want to Activate the this user...?");
		if (r == true) {
			window.location.href="update_active.php?id="+y;
		} 
	}
</script>
</div>
<?php load_footer(); ?>