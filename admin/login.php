<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../classes/Admin.php');
	$admin = new Admin();
?>

<div class="main">
    <h1>Admin Login</h1>
    <div class="adminlogin">
    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){
	       $adminLogin =  $admin->adminLogin($_POST);
        }
    ?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="adminUser"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="adminPass"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"/></td>
			</tr>
			<tr> 
				<td colspan="2">
                    <?php 
                        if(isset($adminLogin)){
        	                echo $adminLogin;
                        }
                    ?>
                </td>
			</tr>
		</table>
	</from>
</div>
</div>
<?php include 'inc/footer.php'; ?>