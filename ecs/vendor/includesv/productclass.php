<?php 
require('DBconnection.php');


class Product extends dbconnection{

	public $pro_id;
	public $pro_name;
	public $pro_desc;
	public $pro_price;
	public $pro_image;
	public $pro_qty;
	public $cat_id;
	public $av_id;
	public $cat_name;
	public $order_date;
	public $p_id;
	public $order_id;
	public $product_id;
	public $product_qty;



	public function create(){
		$query = "INSERT INTO products(pro_name,pro_desc,pro_price,pro_image,cat_id,av_id,pro_qty)
				 VALUES('$this->pro_name','$this->pro_desc','$this->pro_price','$this->pro_image','$this->cat_id','$this->av_id','$this->pro_qty')";
		return $this->performQuery($query);
	}
	public function createor(){
		$query = "INSERT INTO orders(order_date,cust_id)
				 VALUES('$this->order_date','$this->p_id')";
		return $this->performQuery($query);
	}
	public function createord(){
		$query = "INSERT INTO order_details(order_id,product_id,product_qty)
				 VALUES('$this->order_id','$this->product_id','$this->product_qty')";
		return $this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM products,category,accepted_vendors where products.cat_id=category.cat_id and products.av_id=accepted_vendors.av_id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}

	public function readAllcategory(){
		$query  = "SELECT * FROM category";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readAllvendors(){
		$query  = "SELECT * FROM accepted_vendors";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readByIdord($id){
		$query  = "SELECT * FROM orders WHERE cust_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	
	public function readById($id){
		$query  = "SELECT * FROM products WHERE pro_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	
	public function readByIdv($id){
		$query  = "SELECT * FROM products WHERE av_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function readByIdp($id){
		$query  = "SELECT * FROM products WHERE cat_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}

	public function readByIdav($id){
		$query  = "SELECT * FROM accepted_vendors WHERE av_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
	 $query = "UPDATE products SET pro_name         = '$this->pro_name',
								   pro_desc 		= '$this->pro_desc',
								   pro_price 		= '$this->pro_price',
								   pro_image 		= '$this->pro_image',
								   cat_id 		    = '$this->cat_id',
								   av_id 		    = '$this->av_id',
								   pro_qty 		    = '$this->pro_qty' 
								   
								   WHERE pro_id     = $id";
		return $this->performQuery($query);
	}
	public function delete($id){
		$query = "DELETE FROM products WHERE pro_id = $id";
		$this->performQuery($query);
	}

}
