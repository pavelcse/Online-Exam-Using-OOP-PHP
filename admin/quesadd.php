<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
    include_once ("../classes/Exam.php");
    $exm = new Exam();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
        $addQuestion =  $exm->addQuestion($_POST);
    }

    $lastQues = $exm->totalRows();
    $next = $lastQues + 1;
?>
<style>
	.addquestion{ width: 480px; color: #999; margin: 20px auto 0; padding: 10px; border: 1px solid #007FC1; }
</style>
<div class="main">
    <h1>Add Questions</h1>
    <?php
        if(isset($addQuestion)){
            echo $addQuestion;
        }
    ?>
    <div class="addquestion">
    	<form action="" method="post">
            <table>
                   <tr>
                       <td>Question No</td>
                       <td>:</td>
                       <td>
                            <input type="number" name="quesno" value="<?php if(isset($next)){ echo $next; } ?>" required="" />
                        </td>
                   </tr>
                   <tr>
                       <td>Question</td>
                       <td>:</td>
                       <td>
                        <textarea name="ques" placeholder="Question Here" required="" id="" cols="40" rows="5"></textarea>
                       </td>
                   </tr>
                   <tr>
                       <td>Option One</td>
                       <td>:</td>
                       <td><input type="text" name="ans1" placeholder="Option One Here" required="" /></td>
                   </tr>
                   <tr>
                       <td>Option Two</td>
                       <td>:</td>
                       <td><input type="text" name="ans2" placeholder="Option Two Here" required="" /></td>
                   </tr>
                   <tr>
                       <td>Option Three</td>
                       <td>:</td>
                       <td><input type="text" name="ans3" placeholder="Option Three Here" required="" /></td>
                   </tr>
                   <tr>
                       <td>Option Four</td>
                       <td>:</td>
                       <td><input type="text" name="ans4" placeholder="Option Four Here" required="" /></td>
                   </tr>
                   <tr>
                       <td>Correct Option</td>
                       <td>:</td>
                       <td><input type="number" name="rightans" required="" /></td>
                   </tr>
                   <tr>
                       <td colspan="3" align="center"><input type="submit" name="submit" value="Submit Question" /></td>
                   </tr>
               </table>   
        </form>
    </div>


	
</div>
<?php include 'inc/footer.php'; ?>