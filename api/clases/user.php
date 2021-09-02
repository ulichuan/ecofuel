<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

    // * Login functions *
	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT id, password, permiso, descripcion FROM members WHERE username = :username');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	// FOR NEW USERS
	public function isValidUsername($username){
		if (strlen($username) < 3) return false;
		if (strlen($username) > 17) return false;
		if (!ctype_alnum($username)) return false;
		return true;
	}

	public function login($username,$password){
		//if (!$this->isValidUsername($username)) return false;
		//if (strlen($password) < 3) return false;

		$row = $this->get_user_hash($username);
		if($this->isActive($username,$password) == "Yes")
		{
			if(password_verify($password, $row['password'])) {
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['user_name'] = $username;
				$_SESSION['memberID'] = $row['id'];
				$_SESSION['permiso'] = $row['permiso'];
				$_SESSION['descripcion'] = $row['descripcion'];
				return true;
			}
		}
        
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		//if($this->password_verify($password,$hashed_password) ){
		//	session_start();
		//    $_SESSION['loggedin'] = true;
		//    $_SESSION['username'] = $row['username'];
		//	$_SESSION['memberID'] = $row['id'];
		//	$_SESSION['permiso'] = $row['permiso'];
		//    return true;
		//}
	}

	public function isActive($username) {
		try {
			$stmt = $this->_db->prepare('SELECT id, password, active FROM members WHERE username = :username');
			$stmt->execute(array('username' => $username));
			$active = $stmt->fetch();
			return $active['active'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}

	}
	public function logout(){
		session_destroy();
        header('Location: ../index.html');
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
