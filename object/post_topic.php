<?php
class PostTopic{
	// database connection and table name
  private $conn;
  private $table_name = "post_topic";

  // object properties
  public $id;
	public $post_id;
	public $topic_id;
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
	// create new user record
	function create(){
	  // insert query
	  $query = "INSERT INTO " . $this->table_name . " SET post_id = :post_id, topic_id = :topic_id";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->post_id=htmlspecialchars(strip_tags($this->post_id));
	  $this->topic_id=htmlspecialchars(strip_tags($this->topic_id));
	  // bind the values
	  $stmt->bindParam(':post_id', $this->post_id);
	  $stmt->bindParam(':topic_id', $this->topic_id);
	  if($stmt->execute()){
	    return true;
	  }else{
	    $this->showError($stmt);
	    return false;
	  }
	}
	// create new user record
	function update(){
	  // insert query
	  $query = "UPDATE " . $this->table_name . " SET topic_id = :topic_id WHERE post_id = :post_id";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->post_id=htmlspecialchars(strip_tags($this->post_id));
	  $this->topic_id=htmlspecialchars(strip_tags($this->topic_id));
	  // bind the values
	  $stmt->bindParam(':post_id', $this->post_id);
	  $stmt->bindParam(':topic_id', $this->topic_id);
	  if($stmt->execute()){
	    return true;
	  }else{
	    $this->showError($stmt);
	    return false;
	  }
	}
  // used by select drop-down list
  function readByPostId(){
    //select all data
    $query = "SELECT id, topic_id FROM " . $this->table_name . " WHERE post_id = ?";
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->post_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  $this->id = $row['id'];
	  $this->topic_id = $row['topic_id'];
  }
}
?>