<?php 
    include 'inc/header.php'; 
    Session::checkSession();
    $question = $exm->getQuestions();
    $total = $exm->totalQuesRows();
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
    <h1>Welcome to Online Exam</h1>
    <div class="starttest">
        <h2>Test Your Konwledge</h2>
        <p>This is multiple chose question to test your knowledge</p>
        <ul>
            <li><strong>Number of Questions: </strong> <?php echo $total; ?></li>
            <li><strong>Question Type: </strong> Multiple Chose</li>
        </ul>
        <a href="test.php?q=<?php echo $question['quesno']; ?>">Start Test</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>