<?php 

require('DBconnection.php');

class vendor extends dbconnection{

	public $ven_id;
	public $ven_name;
	public $ven_email;
	public $ven_password;
	public $ven_mobile;
	public $ven_comname;
	public $ven_image;
	public $ven_desc;

	
	



	public function create(){
		$query = "INSERT INTO vendor(ven_name,ven_email,ven_password,ven_mobile,ven_comname,ven_image,ven_desc)
				 VALUES('$this->ven_name','$this->ven_email','$this->ven_password','$this->ven_mobile','$this->ven_comname','$this->ven_image','$this->ven_desc')";
		return $this->performQuery($query);
	}
	

	public function readAll(){
		$query  = "SELECT * FROM vendor";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM vedor WHERE ven_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	
	public function delete($id){
		$query = "DELETE FROM vendor WHERE ven_id = $id";
		$this->performQuery($query);
	}
	

	
}
