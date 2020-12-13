<?php
    include  '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';

?>

<?php
    class adminlogin 
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
        }

        public function login_admin($adminuser, $adminpass)
        {
            $adminuser = $this->fm->validation($adminuser);
            $adminpass = $this->fm->validation($adminpass);

            $adminuser = mysqli_real_escape_string($this->db->link, $adminuser);
            $adminpass = mysqli_real_escape_string($this->db->link, $adminpass);
            if(empty($adminuser)||empty($adminpass)){
                $alert = "User and past must be not empty";
                return $alert;
            }
            else{
                $query = "select * from tbl_admin where admin_User = '$adminuser' and admin_Pass = '$adminpass' limit 1";
                $result = $this->db->select($query);
                if ($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('adminId', $value['admin_Id']);
                    Session::set('adminUser', $value['admin_User']);
                    Session::set('adminName', $value['admin_Name']);
                    header('Location:index.php');
                }else {
                    $alert = "User or pass incorrect";
                    return $alert;
                }
            }
        }
    } 
?>