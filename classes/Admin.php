<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
    class Admin{
        private $db;
        private $fm;

        public function __construct(){
        	$this->db = new Database();
        	$this->fm = new Format();
        }

        public function adminLogin($data){
            $username = $this->fm->validation($data['adminUser']);
            $password = $this->fm->validation($data['adminPass']);
            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, md5($password));

            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$username' AND adminPass = '$password'";
            $login_query = $this->db->select($query);
            if($login_query != false){
                $result = $login_query->fetch_assoc();
                Session::init();
                Session::set("adminLogin", true);
                Session::set("adminUser", $result['adminUser']);
                Session::set("adminId", $result['adminId']);
                //header('location: index.php');
                echo "<script> window.location = 'index.php'; </script>";
            }else{
                //echo "<script>alert('Opps. Username or Password Dosn't Match. Please Try Again...!');</script>";

                echo "<span style='color: red'>Opps. Username or Password Dosn't Match. Please Try Again...!</span>";
            }
        }
    }