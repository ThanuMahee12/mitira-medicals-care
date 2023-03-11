<?php 

class User{
    private $fullname;
    private $uid;
    private $dob;
    private $mobile;
    private $email;
    private $password;
    private $username;
    private $address;
    private $nic;
    
    public function setnic($nic){
        $this->nic=$nic;
    }
    public function setfullname($fullname){
        $this->fullname=$fullname;
    }
    public function setuid($uid){
        $this->uid=$uid;
    }
    public function setdob($dob){
        $this->dob=$dob;
    }
    public function setmobile($mobile){
        $this->mobile=$mobile;
    }
    public function setemail($email){
        $this->email=$email;
    }
    public function setpassword($password){
        $this->password=$password;
    }
    public function setusername($username){
        $this->username=$username;
    }
    public function setaddress($address){
        $this->address=$address;
    }
    //getter
     public function getnic(){
        return $this->nic;
    }
    public function getfullname(){
        return $this->fullname;
    }
    public function getuid(){
        return $this->uid;
    }
    public function getdob(){
        return $this->dob;
    }
    public function getmobile(){
        return $this->mobile;
    }
    public function getemail(){
        return $this->email;
    }
    public function getpassword(){
        return $this->password;
    }
    public function getusername(){
        return $this->username;
    }
    public function getaddress(){
        return $this->address;
    }

}

?>