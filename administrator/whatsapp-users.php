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
            WHATSAPP USERS
          </h2>
<?php 
    					$qry="SELECT * FROM users ORDER BY id DESC"; 
						$result=$db->query($qry);
						$num_rows = mysqli_num_rows($result);
?>
            <div class="cate-page-title-wrap tn-category-5" style='padding:0; margin:0px;'>
          <h1 class="cate-title">Total whatsapp users overview: <?php echo $num_rows;?></h1>
        </div>
<br>
   <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Fullname</th><th>Username</th><th>Mobile</th><th>E-mail</th>
                </tr>
              </thead>
              <tbody>
<?php
while ($row = mysqli_fetch_array($result)):
			$id = $row['id'];
			$username =$row['username'];
			$email =$row['email'];
			$name =$row['full_name'];
			$phone =$row['phone'];
  ?>
                <tr>
                  <td><?php echo $name; ?></td><td><?php echo $username; ?></td><td><?php echo $phone; ?></td><td><?php echo $email ?></td>
                </tr>
<?php endwhile; ?>
            </tbody>
            </table>
          </div> 
   
</div>
<?php load_footer(); ?>