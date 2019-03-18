<?php 
    include 'inc/header.php';
    Session::checkSession();
    if(isset($_GET['q'])){
        $q = (int) $_GET['q'];
        $getQ = $exm->getQuesValid($q);
        if($getQ){
        	$number = $q;
        }else{
        	//header('location: exam.php');
        	echo "<script> window.location = 'exam.php'; </script>";
        }
    }else{
    	//header('location: exam.php');
    	echo "<script> window.location = 'exam.php'; </script>";
    }
    $total = $exm->totalQuesRows();
    $question = $exm->getQuestionsByNumber($number);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$strExam = $pro->processData($_POST);
    }
?>
<div class="main">
<h1>Question <?php echo $question['quesno']; ?> of <?php echo $total; ?></h1>
	<div class="test">
		<form method="post" action="">
		    <table> 
			    <tr>
				    <td colspan="2">
				    <h3>Que <?php echo $question['quesno']; ?>: <?php echo $question['ques']; ?></h3>
				    </td>
			    </tr>
                <?php
                    $getans = $exm->getAnswer($number);
                    if($getans){
                	    while ($result = $getans->fetch_assoc()) {
                ?>
			    <tr>
				    <td>
				    <input type="radio" name="ans" value="<?php echo $result['ansid']; ?>" /><?php echo $result['ans']; ?>
				    </td>
			    </tr>
                <?php   		
                	    }
                    }
                ?>
			    <tr>
			        <td>
				        <input type="submit" name="submit" value="Next Question"/>
				        <input type="hidden" name="number" value="<?php echo $number; ?>" />
			        </td>
			    </tr>
		    </table>
	    </form>
</div>
 </div>
<?php include 'inc/footer.php'; ?>