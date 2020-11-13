<?php
class User{
  private $conn;
  private $table_name = "users";
  // object properties
  public $id;
	public $name;
	public $username;
	public $email;
	public $password;
	public $mobile;
	public $city;
	public $state;
	public $facebook;
	public $twitter;
	public $instagram;
	public $bank;
	public $acct_name;
	public $acct_num;
	public $role;
	public $giveaway;
	public $package;
	public $license;
	public $amount;
	public $read;
	public $commented;
	public $liked;
	public $shared;
	public $sponsored;
	public $watched;
	public $subscribed;
	public $liked_video;
	public $shared_video;
	public $affiliate_earnings;
	public $activity_earnings;
	public $earnings_today;
	public $cashpoints;
	public $referred;
	public $referred_by;
	public $referral_link;
	public $access_code;
	public $logged_in;
	public $status;
	public $is_giveaway;
	public $ref_number;
	public $created;
	public $modified;

  // constructor
  public function __construct($db){
    $this->conn = $db;
  }
	public function showError($stmt){
	  echo "<pre>";
	    print_r($stmt->errorInfo());
	    print_r( $stmt->debugDumpParams());
	  echo "</pre>";
	}
  // check if given email exist in the database
	function emailExists(){
	  // query to check if email exists
	  $query = "SELECT * FROM " . $this->table_name . " WHERE email = ? OR username = ? LIMIT 0,1";
	  // prepare the query
	  $stmt = $this->conn->prepare( $query );
	  // sanitize
	  $this->email=htmlspecialchars(strip_tags($this->email));
	  $this->username=htmlspecialchars(strip_tags($this->username));
	  // bind given email value
	  $stmt->bindParam(1, $this->email);
	  $stmt->bindParam(2, $this->username);
	  // execute the query
	  $stmt->execute();
	  // get number of rows
	  $num = $stmt->rowCount();
	  // if email exists, assign values to object properties for easy access and use for php sessions
	  if($num>0){
	    // get record details / values
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	    // assign values to object properties
	    $this->id = $row['id'];
	    $this->name = $row['name'];
	    $this->username = $row['username'];
	    $this->email = $row['email'];
	    $this->password = $row['password'];
	    $this->package = $row['package'];
	    $this->license = $row['license'];
	    $this->role = $row['role'];
	    $this->affiliate_earnings = $row['affiliate_earnings'];
	    $this->activity_earnings = $row['activity_earnings'];
	    $this->earnings_today = $row['earnings_today'];
	    $this->cashpoints = $row['cashpoints'];
	    $this->referred = $row['referred'];
	    $this->referred_by = $row['referred_by'];
	    $this->referral_link = $row['referral_link'];
	    $this->logged_in = $row['logged_in'];
	    $this->login_time = $row['login_time'];
	    $this->status = $row['status'];
	    // return true because email exists in the database
	    return true;
	  }
	  // return false if email does not exist in the database
	  return false;
	}
	// create giveaway user record
	function setGiveaway(){
	  // insert query
	  $query = "INSERT INTO " . $this->table_name . " SET giveaway = :giveaway, package = :package, license = :license, cashpoints = :cashpoints, activity_earnings = :activity_earnings, is_giveaway = 0";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->giveaway=htmlspecialchars(strip_tags($this->giveaway));
	  $this->package=htmlspecialchars(strip_tags($this->package));
	  $this->license=htmlspecialchars(strip_tags($this->license));
	  $this->cashpoints=htmlspecialchars(strip_tags($this->cashpoints));
	  $this->activity_earnings=htmlspecialchars(strip_tags($this->activity_earnings));
	  // bind the values
	  $stmt->bindParam(':giveaway', $this->giveaway);
	  $stmt->bindParam(':package', $this->package);
	  $stmt->bindParam(':license', $this->license);
	  $stmt->bindParam(':cashpoints', $this->cashpoints);
	  $stmt->bindParam(':activity_earnings', $this->activity_earnings);
	  for ($i=0; $i < 472; $i++) {
		  $stmt->execute();
	  }
	}
	function Space(){
		// query to check if email exists
	  $query = "SELECT * FROM " . $this->table_name . " WHERE is_giveaway = 0 AND giveaway = ? AND email is null LIMIT 0,1";
	  $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(1, $this->giveaway);
	  $stmt->execute();
	  $num = $stmt->rowCount();
	  if($num>0){
	  	return true;
	  }
	  return false;
	}
	// update giveaway user record
	function updateGiveaway(){
	  // insert query
	  $query = "UPDATE " . $this->table_name . " SET name = :name, username = :username, email = :email, password = :password, mobile = :mobile, amount = :amount, referral_link = :referral_link, access_code = :access_code, ref_number = :ref_number, is_giveaway = :is_giveaway WHERE email is null and giveaway = :giveaway LIMIT 1";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->name=htmlspecialchars(strip_tags($this->name));
	  $this->username=htmlspecialchars(strip_tags($this->username));
	  $this->email=htmlspecialchars(strip_tags($this->email));
	  $this->password=htmlspecialchars(strip_tags($this->password));
	  $this->mobile=htmlspecialchars(strip_tags($this->mobile));
	  $this->amount=htmlspecialchars(strip_tags($this->amount));
	  $this->giveaway=htmlspecialchars(strip_tags($this->giveaway));
	  $this->referral_link=htmlspecialchars(strip_tags($this->referral_link));
	  $this->access_code=htmlspecialchars(strip_tags($this->access_code));
	  $this->ref_number=htmlspecialchars(strip_tags($this->ref_number));
	  $this->is_giveaway=htmlspecialchars(strip_tags($this->is_giveaway));
	  // bind the values
	  $stmt->bindParam(':name', $this->name);
	  $stmt->bindParam(':username', $this->username);
	  $stmt->bindParam(':email', $this->email);
	  // hash the password before saving to database
	  $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
	  $stmt->bindParam(':password', $password_hash);
	  $stmt->bindParam(':mobile', $this->mobile);
	  $stmt->bindParam(':amount', $this->amount);
	  $stmt->bindParam(':giveaway', $this->giveaway);
	  $stmt->bindParam(':referral_link', $this->referral_link);
	  $stmt->bindParam(':access_code', $this->access_code);
	  $stmt->bindParam(':ref_number', $this->ref_number);
	  $stmt->bindParam(':is_giveaway', $this->is_giveaway);
	  // execute the query, also check if query was successful
	  if ($this->space()) {
		  if($stmt->execute()){
		    return true;
		  }else{
		    return false;
		  }
	  }
	}
	// create new user record
	function create(){
	  // insert query
	  $query = "INSERT INTO " . $this->table_name . " SET name = :name, username = :username, email = :email, password = :password, mobile = :mobile, amount = :amount, package = :package, license = :license, giveaway = :giveaway, activity_earnings = :activity_earnings, cashpoints = :cashpoints, referred_by = :referred_by, referral_link = :referral_link, access_code = :access_code, ref_number = :ref_number";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->name=htmlspecialchars(strip_tags($this->name));
	  $this->username=htmlspecialchars(strip_tags($this->username));
	  $this->email=htmlspecialchars(strip_tags($this->email));
	  $this->password=htmlspecialchars(strip_tags($this->password));
	  $this->mobile=htmlspecialchars(strip_tags($this->mobile));
	  $this->amount=htmlspecialchars(strip_tags($this->amount));
	  $this->package=htmlspecialchars(strip_tags($this->package));
	  $this->license=htmlspecialchars(strip_tags($this->license));
	  $this->giveaway=htmlspecialchars(strip_tags($this->giveaway));
	  $this->activity_earnings=htmlspecialchars(strip_tags($this->activity_earnings));
	  $this->cashpoints=htmlspecialchars(strip_tags($this->cashpoints));
	  $this->referred_by=htmlspecialchars(strip_tags($this->referred_by));
	  $this->referral_link=htmlspecialchars(strip_tags($this->referral_link));
	  $this->access_code=htmlspecialchars(strip_tags($this->access_code));
	  $this->ref_number=htmlspecialchars(strip_tags($this->ref_number));
	  // bind the values
	  $stmt->bindParam(':name', $this->name);
	  $stmt->bindParam(':username', $this->username);
	  $stmt->bindParam(':email', $this->email);
	  // hash the password before saving to database
	  $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
	  $stmt->bindParam(':password', $password_hash);
	  $stmt->bindParam(':mobile', $this->mobile);
	  $stmt->bindParam(':amount', $this->amount);
	  $stmt->bindParam(':package', $this->package);
	  $stmt->bindParam(':license', $this->license);
	  $stmt->bindParam(':giveaway', $this->giveaway);
	  $stmt->bindParam(':activity_earnings', $this->activity_earnings);
	  $stmt->bindParam(':cashpoints', $this->cashpoints);
	  $stmt->bindParam(':referred_by', $this->referred_by);
	  $stmt->bindParam(':referral_link', $this->referral_link);
	  $stmt->bindParam(':access_code', $this->access_code);
	  $stmt->bindParam(':ref_number', $this->ref_number);
	  // execute the query, also check if query was successful
	  if($stmt->execute()){
	    return true;
	  }else{
	    $this->showError($stmt);
	    return false;
	  }
	}
	// read all user records
	function readRole($from_record_num, $records_per_page, $role){
	  // query to read all user records, with limit clause for pagination
	  $query = "SELECT * FROM " . $this->table_name . " WHERE email is not null and role = ? LIMIT ?, ?";
	  // prepare query statement
	  $stmt = $this->conn->prepare( $query );
	  // bind limit clause variables
	  $stmt->bindParam(1, $role);
	  $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
	  $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
	  // execute query
	  $stmt->execute();
	  // return values
	  return $stmt;
	}
	/*/ read all user records
	function readAll($from_record_num, $records_per_page){
	  // query to read all user records, with limit clause for pagination
	  $query = "SELECT * FROM " . $this->table_name . " WHERE email is not null LIMIT ?, ?";
	  // prepare query statement
	  $stmt = $this->conn->prepare( $query );
	  // bind limit clause variables
	  $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
	  $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
	  // execute query
	  $stmt->execute();
	  // return values
	  return $stmt;
	}*/
	// used for paging users
	public function countAll(){
	  // query to select all user records
	  $query = "SELECT id FROM " . $this->table_name . " WHERE email is not null";
	  // prepare query statement
	  $stmt = $this->conn->prepare($query);
	  // execute query
	  $stmt->execute();
	  // get number of rows
	  $num = $stmt->rowCount();
	  // return row count
	  return $num;
	}
	// used for paging users
	public function countByreferral(){
	  // query to select all user records
	  $query = "SELECT id FROM " . $this->table_name . " WHERE referred_by = :referred_by";
	  // prepare query statement
	  $stmt = $this->conn->prepare($query);
	  $this->username=htmlspecialchars(strip_tags($this->username));
	  $stmt->bindParam(':referred_by', $this->username);
	  // execute query
	  $stmt->execute();
	  // get number of rows
	  $num_referred = $stmt->rowCount();
	  // return row count
	  return $num_referred;
	}
	// used for paging users
	public function countByPaid(){
	  // query to select all user records
	  $query = "SELECT id FROM " . $this->table_name . " WHERE referred_by = :referred_by and package != 'Free'";
	  // prepare query statement
	  $stmt = $this->conn->prepare($query);
	  $this->username=htmlspecialchars(strip_tags($this->username));
	  $stmt->bindParam(':referred_by', $this->username);
	  // execute query
	  $stmt->execute();
	  // get number of rows
	  $num_paid = $stmt->rowCount();
	  // return row count
	  return $num_paid;
	}
	// used to get database values for any specified slot in the row present
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
	  $this->name = $row['name'];
	  $this->username = $row['username'];
	  $this->email = $row['email'];
	  $this->password = $row['password'];
	  $this->mobile = $row['mobile'];
	  $this->city = $row['city'];
	  $this->state = $row['state'];
	  $this->facebook = $row['facebook'];
	  $this->twitter = $row['twitter'];
	  $this->instagram = $row['instagram'];
	  $this->bank = $row['bank'];
	  $this->acct_name = $row['acct_name'];
	  $this->acct_num = $row['acct_num'];
	  $this->role = $row['role'];
	  $this->giveaway = $row['giveaway'];
	  $this->package = $row['package'];
	  $this->license = $row['license'];
	  $this->read = $row['read'];
	  $this->commented = $row['commented'];
	  $this->liked = $row['liked'];
	  $this->shared = $row['shared'];
	  $this->sponsored = $row['sponsored'];
	  $this->watched = $row['watched'];
	  $this->subscribed = $row['subscribed'];
	  $this->liked_video = $row['liked_video'];
	  $this->shared_video = $row['shared_video'];
	  $this->affiliate_earnings = $row['affiliate_earnings'];
	  $this->activity_earnings = $row['activity_earnings'];
	  $this->earnings_today = $row['earnings_today'];
	  $this->cashpoints = $row['cashpoints'];
	  $this->referred = $row['referred'];
	  $this->referred_by = $row['referred_by'];
	  $this->referral_link = $row['referral_link'];
	  $this->access_code = $row['access_code'];
	  $this->logged_in = $row['logged_in'];
	  $this->status = $row['status'];
	  $this->is_giveaway = $row['is_giveaway'];
	  $this->ref_number = $row['ref_number'];
	  $this->created = $row['created'];
	  $this->modified = $row['modified'];
	}
	// used to read category name by its ID
	function readName(){
	  $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
	  $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(1, $this->id);
	  $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  $this->name = $row['name'];
	}
	// check if given access_code exist in the database
	function accessCodeExists(){
	  // query to check if access_code exists
	  $query = "SELECT id FROM " . $this->table_name . " WHERE access_code = ? LIMIT 0,1";
	  // prepare the query
	  $stmt = $this->conn->prepare( $query );
	  // sanitize
	  $this->access_code=htmlspecialchars(strip_tags($this->access_code));
	  // bind given access_code value
	  $stmt->bindParam(1, $this->access_code);
	  // execute the query
	  $stmt->execute();
	  // get number of rows
	  $num = $stmt->rowCount();
	  // if access_code exists
	  if($num>0){
		  // return true because access_code exists in the database
		  return true;
	  }
	  // return false if access_code does not exist in the database
	  return false;
	}
	// used in email verification feature
	function updateStatusByAccessCode(){
	  // update query
	  $query = "UPDATE " . $this->table_name . " SET status = :status, logged_in = :logged_in, login_time = :login_time WHERE access_code = :access_code";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->status=htmlspecialchars(strip_tags($this->status));
	  $this->logged_in=htmlspecialchars(strip_tags($this->logged_in));
	  $this->login_time=htmlspecialchars(strip_tags($this->login_time));
	  $this->access_code=htmlspecialchars(strip_tags($this->access_code));
	  // bind the values from the form
	  $stmt->bindParam(':status', $this->status);
	  $stmt->bindParam(':logged_in', $this->logged_in);
	  $stmt->bindParam(':login_time', $this->login_time);
	  $stmt->bindParam(':access_code', $this->access_code);
	  // execute the query
	  if($stmt->execute()){
      return true;
	  }
	  return false;
	}
	// used in forgot password feature
	function updateAccessCode(){
	  // update query
	  $query = "UPDATE " . $this->table_name . " SET access_code = :access_code WHERE email = :email";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->access_code=htmlspecialchars(strip_tags($this->access_code));
	  $this->email=htmlspecialchars(strip_tags($this->email));
	  // bind the values from the form
	  $stmt->bindParam(':access_code', $this->access_code);
	  $stmt->bindParam(':email', $this->email);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
	// used in email verification feature
	function updateLoginTime(){
	  // update query
	  $query = "UPDATE " . $this->table_name . " SET login_time = :login_time WHERE id = :id";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->login_time=htmlspecialchars(strip_tags($this->login_time));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind the values from the form
	  $stmt->bindParam(':login_time', $this->login_time);
	  $stmt->bindParam(':id', $this->id);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
	// used in email verification feature
	function updateLoggedin(){
	  // update query
	  $query = "UPDATE " . $this->table_name . " SET logged_in = :logged_in WHERE id = :id";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->logged_in=htmlspecialchars(strip_tags($this->logged_in));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind the values from the form
	  $stmt->bindParam(':logged_in', $this->logged_in);
	  $stmt->bindParam(':id', $this->id);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
	// used in forgot password feature
	function updatePassword(){
	  // update query
	  $query = "UPDATE " . $this->table_name . " SET password = :password WHERE access_code = :access_code";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->password=htmlspecialchars(strip_tags($this->password));
	  $this->access_code=htmlspecialchars(strip_tags($this->access_code));
	  // bind the values from the form
	  $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
	  $stmt->bindParam(':password', $password_hash);
	  $stmt->bindParam(':access_code', $this->access_code);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
	function updateBank(){
	  $query = "UPDATE " . $this->table_name . " SET bank = :bank, acct_name = :acct_name, acct_num = :acct_num WHERE id = :id";
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->bank=htmlspecialchars(strip_tags($this->bank));
	  $this->acct_name=htmlspecialchars(strip_tags($this->acct_name));
	  $this->acct_num=htmlspecialchars(strip_tags($this->acct_num));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind the values
	  $stmt->bindParam(':bank', $this->bank);
	  $stmt->bindParam(':acct_name', $this->acct_name);
	  $stmt->bindParam(':acct_num', $this->acct_num);
	  $stmt->bindParam(':id', $this->id);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
	function updateSocial(){
	  $query = "UPDATE " . $this->table_name . " SET facebook = :facebook, twitter = :twitter, instagram = :instagram WHERE id = :id";
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->facebook=htmlspecialchars(strip_tags($this->facebook));
	  $this->twitter=htmlspecialchars(strip_tags($this->twitter));
	  $this->instagram=htmlspecialchars(strip_tags($this->instagram));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind the values
	  $stmt->bindParam(':facebook', $this->facebook);
	  $stmt->bindParam(':twitter', $this->twitter);
	  $stmt->bindParam(':instagram', $this->instagram);
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
	public function updateCashpoints(){
		$query = "UPDATE " . $this->table_name . " SET cashpoints = :cashpoints, earnings_today = :earnings_today, activity_earnings = :activity_earnings WHERE id = :id";
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->cashpoints=htmlspecialchars(strip_tags($this->cashpoints));
	  $this->earnings_today=htmlspecialchars(strip_tags($this->earnings_today));
	  $this->activity_earnings=htmlspecialchars(strip_tags($this->activity_earnings));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind the values
	  $stmt->bindParam(':cashpoints', $this->cashpoints);
	  $stmt->bindParam(':earnings_today', $this->earnings_today);
	  $stmt->bindParam(':activity_earnings', $this->activity_earnings);
	  $stmt->bindParam(':id', $this->id);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
	public function liked(){
		$query = "UPDATE " . $this->table_name . " SET liked = :liked WHERE id = :id";
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->liked=htmlspecialchars(strip_tags($this->liked));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind the values
	  $stmt->bindParam(':liked', $this->liked);
	  $stmt->bindParam(':id', $this->id);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
	public function shared(){
		$query = "UPDATE " . $this->table_name . " SET shared = :shared WHERE id = :id";
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->shared=htmlspecialchars(strip_tags($this->shared));
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  // bind the values
	  $stmt->bindParam(':shared', $this->shared);
	  $stmt->bindParam(':id', $this->id);
	  // execute the query
	  if($stmt->execute()){
	    return true;
	  }
	  return false;
	}
}
?>