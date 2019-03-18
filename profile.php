<?php 
    include 'inc/header.php'; 
    Session::checkSession();
    $userID = Session::get('userid');
    $getUser = $usr->gelUserData($userID);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $updateUser = $usr->updateUserData($userID, $_POST);
    }
?>
<style> 
    .profile{width: 620px; margin: 0 auto; padding: 10px; border: 1px solid #00AFC1;}
    .profile table{margin: 0 auto;}
    .profile table tr td{padding: 0px 20px;}
</style>
<div class="main">
    <h1>Online Exam System - User Profile</h1>
    <div class="profile">
    	<table>
    		<tr>
    			<td colspan="2">
    				<?php 
                        if(isset($updateUser)){
                            echo $updateUser;
                        }
                    ?>
    			</td>
    		</tr>
    	</table>
	    <form action="" method="post">
	    	<?php 
                if($getUser){
                	while ($data = $getUser->fetch_assoc()) {
            ?>
		    <table class="tbl">    
			    <tr>
			        <td>Name</td>
			        <td><input name="name" id="name" type="text" value="<?php echo $data['name']; ?>"></td>
			    </tr>
			    <tr>
			        <td>Username</td>
			        <td><input name="username" id="username" type="text" value="<?php echo $data['username']; ?>"></td>
			    </tr>
			    <tr>
			        <td>Email</td>
			        <td><input name="email" id="email" type="text" value="<?php echo $data['email']; ?>"></td>
			    </tr>			
			    <tr>
			        <td></td>
			        <td><input type="submit" name="update" id="update" value="Update Profile"></td>
			    </tr>
            </table>
            <?php
                    }
                }
            ?>
	    </form>
	</div>
</div>
<?php include 'inc/footer.php'; ?>