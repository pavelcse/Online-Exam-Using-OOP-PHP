<?php 
    include 'inc/header.php';
    Session::checkSession();
    $viewans = Session::get('viewans');
    if($viewans == false){
        //header('location: exam.php');
        echo "<script> window.location = 'exam.php'; </script>";
    }else{
        Session::set('viewans', false);
    }
    $total = $exm->totalQuesRows();
?>
<div class="main">
<h1>All Question & Answer: <?php echo $total; ?></h1>
	<div class="test">
		<table> 
			<?php 
                $getQus = $exm->getAllQues();
                if($getQus){
                	while ( $question = $getQus->fetch_assoc()) {
            ?>
			<tr>
				<td colspan="2">
				<h3>Que <?php echo $question['quesno']; ?>: <?php echo $question['ques']; ?></h3>
				</td>
			</tr>
            <?php
            $number = $question['quesno'];
                $getans = $exm->getAnswer($number);
                if($getans){
                	while ($result = $getans->fetch_assoc()) {
            ?>
			<tr>
				<td>
				    <input type="radio" />
				    <?php 
				        if($result['rightans'] == '1'){
                            echo "<span style='color: green'>".$result['ans']."</span>";
				        }else{
				    	    echo $result['ans']; 
				        }
				    ?>
				</td>
			</tr>
            <?php   		
                	}
                }
  		
                	}
                }
            ?>
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>