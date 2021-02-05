<?php 

require('DBconnection.php');

class customer extends dbconnection{

	public $cust_id;
	public $cust_name;
	public $cust_email;
	public $cust_password;	
	public $cust_mobile;
	public $cust_address;
	public $av_email;
	public $av_pass;
	



	public function create(){
		$query = "INSERT INTO customer(cust_name,cust_email,cust_password,cust_mobile,cust_address)
				 VALUES('$this->cust_name','$this->cust_email','$this->cust_password','$this->cust_mobile','$this->cust_address'
				 )";
		return $this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM customer";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM customer WHERE cust_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	
	public function delete($id){
		$query = "DELETE FROM customer WHERE cust_id = $id";
		$this->performQuery($query);
	}
public function login($email,$pass){
		$query  = "SELECT * FROM customer 
		           WHERE cust_email         = '$email' AND
					     cust_password 	 = '$pass' ";
		
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function loginv($email,$pass){
		$query  = "SELECT * FROM accepted_vendors 
		           WHERE av_email         = '$email' AND
					     av_pass 	      = '$pass' ";
		
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
}
