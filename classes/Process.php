<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
    class Process{
        private $db;
        private $fm;

        public function __construct(){
        	$this->db = new Database();
        	$this->fm = new Format();
        }

        public function processData($data){
            $ans     = $this->fm->validation($data['ans']);
            $number  = $this->fm->validation($data['number']);
            $ans     = mysqli_real_escape_string($this->db->link, $data['ans']);
            $number  = mysqli_real_escape_string($this->db->link, $data['number']);
            $next    = $number+1;

            if(!isset($_SESSION['score'])){
                $_SESSION['score'] = '0';
            }
            $total = $this->getTotal();
            $right = $this->rightAns($number);
            if($right == $ans){
                $_SESSION['score']++;
            }
            if($number == $total){
                //header('location: final.php');
                echo "<script> window.location = 'final.php'; </script>";
            }else{
                //header('location: test.php?q='.$next);
                 echo "<script> window.location = 'test.php?q=".$next."'; </script>";
            }
        }

        private function getTotal(){
            $query = "SELECT * FROM tbl_ques";
            $result = $this->db->select($query);
            $total = $result->num_rows; 
            return $total;
        }

        private function rightAns($number){
            $query = "SELECT * FROM tbl_ans WHERE quesno = '$number' AND rightans = '1'";
            $getdata = $this->db->select($query)->fetch_assoc();
            $result = $getdata['ansid'];
            return $result;
        }
    }