<?php
class Topic{
	// database connection and table name
  private $conn;
  private $table_name = "topics";

  // object properties
  public $id;
	public $name;
	public $topic_slug;
  public function __construct($db){
    $this->conn = $db;
  }
	public function showError($stmt){
	  echo "<pre>";
	    print_r($stmt->errorInfo());
	    print_r( $stmt->debugDumpParams());
	  echo "</pre>";
	}
  // used by select drop-down list
  function read(){
    //select all data
    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id";
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    return $stmt;
  }
	// used to read category name by its ID
	function readName(){
	  $query = "SELECT name, topic_slug FROM " . $this->table_name . " WHERE id = ? limit 0,1";
	  $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(1, $this->id);
	  $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  $this->name = $row['name'];
	  $this->topic_slug = $row['topic_slug'];
	}
	// read all products
	function readAll($from_record_num, $records_per_page){
		// select all products query
		$query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC LIMIT ?, ?";
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
		// bind limit clause variables
		$stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
		$stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
		// execute query
		$stmt->execute();
		// return values
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
	function topicExists(){
		// query to check if email exists
	  $query = "SELECT * FROM " . $this->table_name . " WHERE name = ? LIMIT 0,1";
	  $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(1, $this->name);
	  $stmt->execute();
	  $num = $stmt->rowCount();
	  if($num>0){
	  	return true;
	  }
	  return false;
	}
	// create new user record
	function create(){
	  // insert query
	  $query = "INSERT INTO " . $this->table_name . " SET name = :name, topic_slug = :topic_slug";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->name=htmlspecialchars(strip_tags($this->name));
	  $this->topic_slug=htmlspecialchars(strip_tags($this->topic_slug));
	  // bind the values
	  $stmt->bindParam(':name', $this->name);
	  $stmt->bindParam(':topic_slug', $this->topic_slug);
	  // execute the query, also check if query was successful
	  if($stmt->execute()){
	    return true;
	  }else{
	    $this->showError($stmt);
	    return false;
	  }
	}
	// used in email verification feature
	function update(){
	  // update query
	  $query = "UPDATE " . $this->table_name . " SET name = :name, topic_slug = :topic_slug WHERE id = :id";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->name=htmlspecialchars(strip_tags($this->name));
	  $this->topic_slug=htmlspecialchars(strip_tags($this->topic_slug));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind the values from the form
	  $stmt->bindParam(':name', $this->name);
	  $stmt->bindParam(':topic_slug', $this->topic_slug);
	  $stmt->bindParam(':id', $this->id);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
	// delete the user
	function delete(){
	  $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
	  $stmt = $this->conn->prepare($query);
	  $stmt->bindParam(1, $this->id);
	  if($result = $stmt->execute()){
	    return true;
	  }else{
	    return false;
	  }
	}
}
?>