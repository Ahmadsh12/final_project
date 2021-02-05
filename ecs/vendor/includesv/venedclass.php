<?php 

require('DBconnection.php');

class vened extends dbconnection{

	public $av_id;
	public $av_name;
	public $av_email;
	public $av_pass;
	public $av_mobile;
	public $av_comname;
	public $av_image;
	public $av_desc;
	


	/*public function readAll(){
		$query  = "SELECT * FROM customer";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}*/
	public function readById($id){
		$query  = "SELECT * FROM accepted_vendors WHERE av_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		$query = "UPDATE accepted_vendors SET av_name     = '$this->av_name',
									 av_email             = '$this->av_email',
									 av_pass              = '$this->av_pass',
									 av_mobile            = '$this->av_mobile',
									 av_comname           = '$this->av_comname',
									 av_image             = '$this->av_image',
									 av_desc              = '$this->av_desc'
						    WHERE    av_id   = $id";
		return $this->performQuery($query);
	}
	

}
