<?php 

class User{
	private $username;
	private $email;
	private $password;
	private $userid;
	private $firstname;
	private $lastname;
	private $profile;
	function __construct() {	
	
	}
	public function setusername($username){
	$this->username=$username;
		return $this;
	}
	public function setemail($email){
	$this->email=$email;
		return $this;
	}
	public function setpassword($password){
	$this->password=$password;
		return $this;
	}
	public function setuserid($userid){
	$this->userid=$userid;
		return $this;
	}
	public function setfirstname($firstname){
	$this->firstname=$firstname;
		return $this;
	}
	public function setlastname($lastname){
	$this->lastname=$lastname;
		return $this;
	}
public function setprofile($profile){
	$this->profile=$profile;
	return $this;
}
public function getusername(){
	return $this->username;
	}
	public function getemail($email){
	return $this->email
	}
	public function getpassword(){
	return $this->password;
	}
	public function getuserid(){
	return $this->userid;
	}
	public function getfirstname(){
	return $this->firstname;
	}
	public function getlastname(){
	return $this->lastname;
	}
public function getprofile(){
	return $this->profile;
}
}


class Doctor extends User{
	
}
class Admin extends User{
	
}
class Client extends User{
	
}
class Disease{
	
}	
class Symtoms{
	
}
class Reatments{
	
}
class Medicine{
	
}
class Appointments{
	
}

	
?>