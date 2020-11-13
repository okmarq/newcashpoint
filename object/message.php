<?php
class Message{
	// database connection and table name
  private $conn;
  private $table_name = "messages";

  // object properties
  public $id;
  public $name;
  public $email;
  public $subject;
  public $message;
  public $reply;
  public $sent;
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
	function create(){
	  // to get time stamp for 'sent' field
	  $this->sent=date('Y-m-d H:i:s');
	  // insert query
	  $query = "INSERT INTO " . $this->table_name . " SET name = :name, email = :email, subject = :subject, message = :message, sent = :sent";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->name=htmlspecialchars(strip_tags($this->name));
	  $this->email=htmlspecialchars(strip_tags($this->email));
	  $this->subject=htmlspecialchars(strip_tags($this->subject));
	  $this->message=htmlspecialchars(strip_tags($this->message));
	  // bind the values
	  $stmt->bindParam(':name', $this->name);
	  $stmt->bindParam(':email', $this->email);
	  $stmt->bindParam(':subject', $this->subject);
	  $stmt->bindParam(':message', $this->message);
	  $stmt->bindParam(':sent', $this->sent);
	  // execute the query, also check if query was successful
	  if($stmt->execute()){
	    return true;
	  }else{
	    $this->showError($stmt);
	    return false;
	  }
	}
	function updateReply(){
	  // update query
	  $query = "UPDATE " . $this->table_name . " SET reply = :reply WHERE id = :id";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->reply=htmlspecialchars(strip_tags($this->reply));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  $stmt->bindParam(':reply', $this->reply);
	  $stmt->bindParam(':id', $this->id);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
  // read all message records
	function readAll($from_record_num, $records_per_page){
	  // query to read all message records, with limit clause for pagination
	  $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC LIMIT ?, ?";
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
	// used for paging messages
	public function countAll(){
	  // query to select all message records
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
	// delete the message
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