<?php

class Product{
	private $productID;
	private $description;
	private $price;
	private $type;
	private $image;
	private $connection;
	const TABLE_NAME = "Producto";	

	function __construct($connection){
		$this->connection = $connection;
	}

	public function getProducts(){
		$query = "SELECT * FROM ".self::TABLE_NAME;
		$products = $this->connection->get_data($query);

		
		if (mysqli_num_rows($products)) {
			
			foreach($products as $product) {
				$product['precio'] = number_format($product['precio'], 2, ".", ",");
			}
			
			return $products;
		} else {
			return false;
		}

	}

	/**** Getters AND Setters ****/
	public function setProductID($productID){ 
		$this->productID = $productID;
	}

	public function getProductID() {
		return $this->productID;
	}

	public function setDescription($description){ 
		$this->description = $description;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setType($type){ 
		$this->type = $type;
	}

	public function getType() {
		return $this->type;
	}

	public function setPrice($price){ 
		$this->price = $price;
	}

	public function getPrice() {
		return $this->price;
	}

	public function setImage($image){ 
		$this->image = $image;
	}

	public function getImage() {
		return $this->image;
	}
	
}

?>


