<?php
// use readOne to get a data from row if something in its like breaks
class Forum{
  private $conn;
  private $table_name = "forums";
  // object properties
  public $id;
  public $created;
  public $modified;
  // constructor
  public function __construct($db){
    $this->conn = $db;
  }
	public function showError($stmt){
	  echo "<pre>";
	    print_r($stmt->errorInfo());
	  echo "</pre>";
	}
	// create new forum record
	function create(){
	  // insert query
	  $query = "INSERT INTO " . $this->table_name . " SET ";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  if($stmt->execute()){
	    return true;
	  }else{
	    $this->showError($stmt);
	    return false;
	  }
	}
	// read all forum records
	function readAll($from_record_num, $records_per_page){
	  // query to read all forum records, with limit clause for pagination
	  $query = "SELECT * FROM " . $this->table_name . " LIMIT ?, ?";
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
	// used for paging forums
	public function countAll(){
	  // query to select all forum records
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
	function readOne(){
	  // query to select single record
	  $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
	  // prepare query statement
	  $stmt = $this->conn->prepare( $query );
	  // sanitize
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind product id value
	  $stmt->bindParam(1, $this->id);
	  // execute query
	  $stmt->execute();
	  // get row values
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  // assign retrieved row value to object properties
	  $this->id = $row['id'];
	  $this->created = $row['created'];
	  $this->modified = $row['modified'];
	}
	// delete the forum
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
<!-- #make a decree that only marquis can see and do certain things of all the admins muahahahaha! -->