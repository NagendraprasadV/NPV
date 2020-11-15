<?php
session_start();
include_once 'crud/database.php';

$db = new Dbh;

$connect = $db->connect();

$login = new login($connect);
/**
 *  class for login
 */
class login 
{
	private  $conn;

	public function __construct($conn)
	{
		$this->conn = $conn;

	}

	public function userLogin($username, $password){
       
        $query = "select * from users where username='$username' and password='$password'";
	    $smt = $this->conn->prepare($query);
	    
	    $smt->execute();
        if($smt->rowCount() > 0)
	    {
            $_SESSION['username'] = $username;

	    	return 1;
	    }
	    else{
	    	return 0;
	    }
	    
	}

	public function rememberme($rememberme){

		//COOKIES for username
		setcookie ("username",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
		//COOKIES for password
		setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));

	}
}

?>