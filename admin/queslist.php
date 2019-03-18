<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
    include_once ("../classes/Exam.php");
    $exm = new Exam();

    if(isset($_GET['remove'])){
        $removeid = (int)$_GET['remove'];
        $removeques = $exm->removeQues($removeid);
    }
?>
<div class="main">
    <h1>Questions List</h1>
    <?php
        if(isset($removeques)){
            echo $removeques;
        }
    ?>
    <div class="question">
    	<table class="tblone">
            <tr>
                <th width="10%">SL</th>
                <th width="80%">Question</th>
                <th width="20%">Action</th> 
            </tr>
            <?php 
                $allQues = $exm->getAllQues();
                if($allQues){
                    $i = 0;
                    while ($data = $allQues->fetch_assoc()) {
                        $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['ques']; ?></td>
                <td>
                    <a onclick="return confirm('Are You Sure To Remove?')" href="?remove=<?php echo $data['quesno']; ?>">Remove</a>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>	
</div>
<?php include 'inc/footer.php'; ?>