<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	
	public function check_user($uname,$upass)
	{
		try
		{
			
			$stmt = $this->conn->prepare("SELECT `user_id`, `user`, `pass` FROM `tbluser` WHERE `user` = :uname");
			$stmt->execute(array(':uname'=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function check_user_1($uname,$upass)
	{
		try
		{
			//$upwd = md5($upass);
			$stmt = $this->conn->prepare("SELECT `user_id`, `user`, `pass` FROM `tbluser` WHERE `user` =:uname ");
			$stmt->execute(array(':uname'=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				return true;
			}else
			{
				return false;
			}
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	

}
?>