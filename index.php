<?php 
    include 'inc/header.php'; 
    Session::checkLogin();
?>
<div class="main">
    <h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
		<div style="min-height: 50px">
			<span class="empty" style="display: none;" id="">Field Must Not Be Empty.</span>
			<span class="desable" style="display: none;" id="">User Desable. You Can't Login At This Moment.</span>
			<span class="error" style="display: none;" id="">User or Password Does't Match.</span>
		</div>
	    <form action="" method="post">
		    <table class="tbl">    
			    <tr>
			    <td>Email</td>
			    <td><input name="email" id="email" type="text"></td>
			    </tr>
			    <tr>
			    <td>Password </td>
			    <td><input name="password" id="password" type="password"></td>
			    </tr>
			    
			    <tr>
			    <td></td>
			    <td><input type="submit" name="login" id="login" value="Login">
			    </td>
			    </tr>
            </table>
	    </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	</div>
</div>
<?php include 'inc/footer.php'; ?>