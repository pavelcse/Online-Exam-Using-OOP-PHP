<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
    class User{
        private $db;
        private $fm;

        public function __construct(){
        	$this->db = new Database();
        	$this->fm = new Format();
        }

        public function userRegistration($name, $username, $password, $email){
            $name       = $this->fm->validation($name);
            $username   = $this->fm->validation($username);
            $password   = $this->fm->validation($password);
            $email      = $this->fm->validation($email);
            $name       = mysqli_real_escape_string($this->db->link, $name);
            $username   = mysqli_real_escape_string($this->db->link, $username);
            $password   = mysqli_real_escape_string($this->db->link, $password);
            $email      = mysqli_real_escape_string($this->db->link, $email);
            
            if($name == '' || $username == '' || $password == '' || $email == ''){
                echo "<span class='error'>Field Must Not Be Empty...!!!</span>";
                exit();
            }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo "<span class='error'>Given Email Is Not Valid...!!!</span>";
                exit();
            }else{
                $checkemail = "SELECT * FROM tbl_user WHERE email = '$email'";
                $checkresult = $this->db->select($checkemail);
                if($checkresult != false){
                    echo "<span class='error'>Given Email Already Exist...!!!</span>";
                    exit();
                }else{
                    $password = md5($password);
                    $query = "INSERT INTO tbl_user(name, username, password, email) VALUES('$name', '$username', '$password', '$email')";
                    $result = $this->db->insert($query);
                    if($result){
                        echo "<span class='success'>User Registration Successfull...</span>";
                        exit();
                    }else{
                        echo "<span class='error'>Registration Failed. Please Try Again Later...!!!</span>";
                        exit();
                    }
                }
            }
            
        }

        public function userLogin($email, $password){
            
            $email      = $this->fm->validation($email);
            $password   = $this->fm->validation($password);
            $email      = mysqli_real_escape_string($this->db->link, $email);
            $password   = mysqli_real_escape_string($this->db->link, $password);
            if($email == '' || $password == ''){
                echo "empty";
                exit();
            }else{
                $password = md5($password);
                $query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
                $result = $this->db->select($query);
                if($result != false){
                    $data = $result->fetch_assoc();
                    if($data['status'] == '1'){
                        echo "desable";
                        exit();
                    }else{
                        Session::init();
                        Session::set('login', true);
                        Session::set('userid', $data['userid']);
                        Session::set('username', $data['username']);
                        Session::set('name', $data['name']);
                    }
                }else{
                    echo "error";
                    exit();
                }
            }  
        }
        
        public function gelUserData($userid){
            $query = "SELECT * FROM tbl_user WHERE userid = '$userid'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateUserData($userID, $data){
            $name       = $this->fm->validation($data['name']);
            $username   = $this->fm->validation($data['username']);
            $email      = $this->fm->validation($data['email']);
            $name       = mysqli_real_escape_string($this->db->link, $name);
            $username   = mysqli_real_escape_string($this->db->link, $username);
            $email      = mysqli_real_escape_string($this->db->link, $email);

            $query = "UPDATE tbl_user SET name = '$name', username = '$username', email = '$email' WHERE userid = '$userID'";
            $result = $this->db->update($query);
            if($result){
                $msg =  "<span style='color: green'>User Data Has Been Updated...!</span>";
                return $msg;
            }else{
                $msg =  "<span style='red: green'>Operation Unsuccessfull...!!!</span>";
                return $msg;
            }
        }

        public function getAllUser(){
        	$query = "SELECT * FROM tbl_user ORDER BY userid DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function desableUser($desableid){
            $query = "UPDATE tbl_user SET status = '1' WHERE userid = '$desableid'";
            $result = $this->db->update($query);
            if($result){
            	$msg =  "<span style='color: green'>User Has Been Desabled...!</span>";
            	return $msg;
            }else{
            	$msg =  "<span style='red: green'>Operation Unsuccessfull...!!!</span>";
            	return $msg;
            }
        }

        public function enableUser($enableid){
        	$query = "UPDATE tbl_user SET status = '0' WHERE userid = '$enableid'";
            $result = $this->db->update($query);
            if($result){
            	$msg =  "<span style='color: green'>User Has Been Enabled...!</span>";
            	return $msg;
            }else{
            	$msg =  "<span style='red: green'>Operation Unsuccessfull...!!!</span>";
            	return $msg;
            }
        }

        public function removeUser($removeid){
        	$query = "DELETE FROM tbl_user WHERE userid = '$removeid'";
            $result = $this->db->delete($query);
            if($result){
            	$msg =  "<span style='color: green'>User Has Been Removed...!</span>";
            	return $msg;
            }else{
            	$msg =  "<span style='red: green'>Operation Unsuccessfull...!!!</span>";
            	return $msg;
            }
        }
    }