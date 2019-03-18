<?php 
    include 'inc/header.php'; 
    Session::checkSession();
    if(!isset($_SESSION['score'])){
        //header('location: exam.php');
        echo "<script> window.location = 'exam.php'; </script>";
    }
    Session::set('viewans', true);
?>
<style> 
    .starttest{width: 620px; margin: 0 auto; padding: 10px; border: 1px solid #00AFC1; color: #444;}
    .starttest h2{
        border-bottom: 1px solid #ddd; 
        font-size: 20px;
        margin-bottom: 10px;
        text-align: center;
    }
    .starttest ul{margin: 0; padding: 0; list-style: none;}
    .starttest ul li{margin-top: 5px;}
    .starttest a{
        background: #007FC1 none repeat scroll 0 0;
        border: 1px solid #ddd;
        color: #fff;
        display: block;
        margin-top: 10px;
        padding: 6px 10px;
        text-align: center;
        text-decoration: none;
    }
</style>
<div class="main">
    <h1>Exam Finished</h1>
    <div class="starttest">
        <p>Congrats ! You Have Just Finished Your Exam.</p>
        <p>Your Final Score : 
        	<strong>
        		<?php
                    if(isset($_SESSION['score'])){
                        echo $_SESSION['score'];
                        unset($_SESSION['score']);
                    }
        		?>
        	</strong>
        </p>
        <a href="viewans.php">View Answer</a>
        <a href="starttest.php">Start Again</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>