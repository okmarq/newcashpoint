<?php
class Withdrawal{
	// database connection and table bank
  private $conn;
  private $table_bank = "withdrawals";
  // object properties
  public $id;
  public $user_id;
  public $bank;
  public $acct_name;
  public $acct_num;
  public $email;
  public $package;
  public $license;
  public $cp;
  public $amount;
  public $status;
  public function __construct($db){
    $this->conn = $db;
  }
  // create new withdrawal record
	public function create(){
	  // insert query
	  $query = "INSERT INTO " . $this->table_bank . " SET user_id = :user_id, bank = :bank, acct_name = :acct_name, acct_num = :acct_num, email = :email, package = :package, license = :license, cp = :cp, amount = :amount";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->user_id=htmlspecialchars(strip_tags($this->user_id));
	  $this->bank=htmlspecialchars(strip_tags($this->bank));
	  $this->acct_name=htmlspecialchars(strip_tags($this->acct_name));
	  $this->acct_num=htmlspecialchars(strip_tags($this->acct_num));
	  $this->email=htmlspecialchars(strip_tags($this->email));
	  $this->package=htmlspecialchars(strip_tags($this->package));
	  $this->license=htmlspecialchars(strip_tags($this->license));
	  $this->cp=htmlspecialchars(strip_tags($this->cp));
	   $this->amount=htmlspecialchars(strip_tags($this->amount));
	  // bind the values
	   $stmt->bindParam(':user_id', $this->user_id);
	  $stmt->bindParam(':bank', $this->bank);
	  $stmt->bindParam(':acct_name', $this->acct_name);
	  $stmt->bindParam(':acct_num', $this->acct_num);
	  $stmt->bindParam(':email', $this->email);
	  $stmt->bindParam(':package', $this->package);
	  $stmt->bindParam(':license', $this->license);
	  $stmt->bindParam(':cp', $this->cp);
	  $stmt->bindParam(':amount', $this->amount);
	  // execute the query, also check if query was successful
	  if($stmt->execute()){
	    return true;
	  }else{
	    $this->showError($stmt);
	    return false;
	  }
	}
	public function showError($stmt){
	  echo "<pre>";
	    print_r($stmt->errorInfo());
	    print_r( $stmt->debugDumpParams());
	  echo "</pre>";
	}
	// used to get database values for any specified slot in the row present
	function readOne(){
	  // query to select single record
	  $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = ? LIMIT 0,1";
	  // prepare query statement
	  $stmt = $this->conn->prepare( $query );
	  // sanitize
	  $this->user_id=htmlspecialchars(strip_tags($this->user_id));
	  // bind product id value
	  $stmt->bindParam(1, $this->user_id);
	  // execute query
	  $stmt->execute();
	  // get row values
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  // assign retrieved row value to object properties
	  $this->id = $row['id'];
	  $this->user_id = $row['user_id'];
	  $this->bank = $row['bank'];
	  $this->acct_name = $row['acct_name'];
	  $this->acct_num = $row['acct_num'];
	  $this->email = $row['email'];
	  $this->package = $row['package'];
	  $this->amount = $row['amount'];
	  $this->status = $row['status'];
	}
	function updateReply(){
	  // update query
	  $query = "UPDATE " . $this->table_bank . " SET reply = :reply WHERE id = :id";
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
  // read all withdrawal records
	function readAll($from_record_num, $records_per_page){
	  // query to read all withdrawal records, with limit clause for pagination
	  $query = "SELECT * FROM " . $this->table_bank . " ORDER BY id ASC LIMIT ?, ?";
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
	// used for paging withdrawals
	public function countAll(){
	  // query to select all withdrawal records
	  $query = "SELECT id FROM " . $this->table_bank . "";
	  // prepare query statement
	  $stmt = $this->conn->prepare($query);
	  // execute query
	  $stmt->execute();
	  // get number of rows
	  $num = $stmt->rowCount();
	  // return row count
	  return $num;
	}
	// delete the withdrawal
	function delete(){
	  $query = "DELETE FROM " . $this->table_bank . " WHERE id = ?";
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