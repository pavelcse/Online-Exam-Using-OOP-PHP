<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<style>
	.adminpanel{ width: 500px; color: #999; margin: 30px auto 0; padding: 50px; border: 1px solid #007FC1; }
</style>
<div class="main">
    <h1>Admin Panel</h1>
    <div class="adminpanel">
    	<h3>Welcome To Control Admin Panel</h3>
    	<p>You can manage your user and online exam system here</p>
    </div>


	
</div>
<?php include 'inc/footer.php'; ?>