<?php
namespace Login\LoginBundle\Modals;


class Login{
	private $email;
	private $password;


	public function getEmail(){
		return $this->email;
	}


	public function setEmail($email){
		$this->email = $email;
	}


	public function setPassword($password){
		$this->password = $password;
	}	


	public function getPassword(){
		return $this->password;
	}


}
