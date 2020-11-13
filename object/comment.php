<?php
class Comment{
	// database connection and table name
  private $conn;
  private $table_name = "comments";

  // object properties
  public $id;
	public $user_id;
	public $post_id;
	public $comment;
	public $created;
	public $modified;
  public function __construct($db){
    $this->conn = $db;
  }
	public function showError($stmt){
	  echo "<pre>";
	    print_r($stmt->errorInfo());
	    print_r( $stmt->debugDumpParams());
	    print_r($stmt->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ));
	  echo "</pre>";
	}
  // create new message record
	function comment(){
	  // insert query
	  $query = "INSERT INTO " . $this->table_name . " SET user_id = :user_id, post_id = :post_id, comment = :comment";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->user_id=htmlspecialchars(strip_tags($this->user_id));
	  $this->post_id=htmlspecialchars(strip_tags($this->post_id));
	  $this->comment=htmlspecialchars(strip_tags($this->comment));
	  // bind the values
	  $stmt->bindParam(':user_id', $this->user_id);
	  $stmt->bindParam(':post_id', $this->post_id);
	  $stmt->bindParam(':comment', $this->comment);
	  // execute the query, also check if query was successful
	  if($stmt->execute()){
	    return true;
	  }else{
	    $this->showError($stmt);
	    return false;
	  }
	}
	// used to get database values for any specified slot in the row present
	function readOne(){
	  // query to select single record
	  $query = "SELECT * FROM " . $this->table_name . " WHERE post_id = ? ORDER BY created DESC";
	  // prepare query statement
	  $stmt = $this->conn->prepare( $query );
	  // sanitize
	  $this->post_id=htmlspecialchars(strip_tags($this->post_id));
	  // bind product id value
	  $stmt->bindParam(1, $this->post_id);
	  // execute query
	  $stmt->execute();
	  // get row values
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  // assign retrieved row value to object properties
	  $this->id = $row['id'];
	  $this->user_id = $row['user_id'];
	  $this->post_id = $row['post_id'];
	  $this->comment = $row['comment'];
	  $this->created = $row['created'];
	  $this->modified = $row['modified'];
	}
  // used by select drop-down list
  function read(){
    //select all data
    $query = "SELECT * FROM " . $this->table_name . " WHERE post_id = ? ORDER BY created DESC";
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->post_id);
    $stmt->execute();
    return $stmt;
  }
	// used for paging users
	public function countAll(){
	  // query to select all user records
	  $query = "SELECT id FROM " . $this->table_name . "";
	  // prepare query statement
	  $stmt = $this->conn->prepare($query);
	  // execute query
	  $stmt->execute();
	  // get number of rows
	  $num = $stmt->rowCount();
	  // return row count
	  return $num;
	}
}
?>