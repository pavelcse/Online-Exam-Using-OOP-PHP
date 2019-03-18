<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
    class Exam{
        private $db;
        private $fm;

        public function __construct(){
        	$this->db = new Database();
        	$this->fm = new Format();
        }

        public function addQuestion($data){
            $quesno     = mysqli_real_escape_string($this->db->link, $data['quesno']);
            $ques       = mysqli_real_escape_string($this->db->link, $data['ques']);
            $ans        = array();
            $ans[1]     = mysqli_real_escape_string($this->db->link, $data['ans1']);
            $ans[2]     = mysqli_real_escape_string($this->db->link, $data['ans2']);
            $ans[3]     = mysqli_real_escape_string($this->db->link, $data['ans3']);
            $ans[4]     = mysqli_real_escape_string($this->db->link, $data['ans4']);
            $rightans   = mysqli_real_escape_string($this->db->link, $data['rightans']);

            $query = "INSERT INTO tbl_ques(quesno, ques) VALUES('$quesno', '$ques')";
            $insert_query = $this->db->insert($query);
            if($insert_query){
                foreach ($ans as $key => $ansName) {
                    if($ansName != ''){
                        if($rightans == $key){
                            $ans_query = "INSERT INTO tbl_ans(quesno, rightans, ans) VALUES('$quesno', '1', '$ansName')";
                        }else{
                            $ans_query = "INSERT INTO tbl_ans(quesno, rightans, ans) VALUES('$quesno', '0', '$ansName')";
                        }
                       $insert_ans = $this->db->insert($ans_query); 
                       if($insert_ans){
                            continue;
                       }else{
                        die('Error to Insert Question...!');
                       }
                    }
                }
                $msg = "<span style='color: green'>Question Has Been Submitted...!</span>";
                return $msg;
            }
        }

        public function totalRows(){
            $query = "SELECT quesid FROM tbl_ques ORDER BY quesid DESC LIMIT 1";
            $result = $this->db->select($query);
            if($result){
                $lastvalue = $result->fetch_assoc();
                $value = $lastvalue['quesid'];
                return $value;
            }
        }

        public function getAllQues(){
            $query = "SELECT * FROM tbl_ques ORDER BY quesno ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function removeQues($removeid){
            $tables = array('tbl_ques', 'tbl_ans');
            foreach ($tables as $table) {
                $query = "DELETE FROM $table WHERE quesno = '$removeid'";
                $result = $this->db->delete($query);
            }
            if($result){
                $msg =  "<span style='color: green'>Question Has Been Removed...!</span>";
                return $msg;
            }else{
                $msg =  "<span style='red: green'>Operation Unsuccessfull...!!!</span>";
                return $msg;
            }
        }

        public function totalQuesRows(){
            $query = "SELECT * FROM tbl_ques";
            $result = $this->db->select($query);
            $total = $result->num_rows; 
            return $total;
        }

        public function getQuestions(){
            $query = "SELECT * FROM tbl_ques";
            $result = $this->db->select($query);
            $getdata = $result->fetch_assoc();
            return $getdata;
        }

        public function getQuestionsByNumber($number){
            $query = "SELECT * FROM tbl_ques WHERE quesno = '$number'";
            $result = $this->db->select($query);
            $getdata = $result->fetch_assoc();
            return $getdata;
        }

        public function getAnswer($number){
            $query = "SELECT * FROM tbl_ans WHERE quesno = '$number'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getQuesValid($q){
            $checkQ = "SELECT * FROM tbl_ques WHERE quesno = '$q'";
            $checkresult = $this->db->select($checkQ);
            return $checkresult;
        }

    }