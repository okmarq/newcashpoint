<?php
class Post{
	// database connection and table name
  private $conn;
  private $table_name = "posts";
  // object properties
  public $id;
  public $user_id;
  public $title;
  public $image;
  public $content;
  public $description;
  public $published;
  public $slug;
  public $tags;
  public $views;
  public $liked;
  public $shared;
  public $created;
  public $modified;
  public function __construct($db){
    $this->conn = $db;
  }
	public function showError($stmt){
	  echo "<pre>";
	    print_r($stmt->errorInfo());
	    print_r( $stmt->debugDumpParams());
	  echo "</pre>";
	}
	function check(){
	  $query = "SELECT * FROM " . $this->table_name . " WHERE slug = ? LIMIT 1";
	  $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(1, $this->slug);
	  $stmt->execute();
	  $num = $stmt->rowCount();
	  if($num>0){
	  	return false;
	  }
	  return true;
	}
	// create new user record
	function create(){
	  // insert query
	  $query = "INSERT INTO " . $this->table_name . " SET user_id = :user_id, title = :title, image = :image, content = :content, description = :description, published = :published, slug = :slug, tags = :tags";
	  // prepare the query
	  $stmt = $this->conn->prepare($query);
	  // sanitize
	  $this->user_id=htmlspecialchars(strip_tags($this->user_id));
	  $this->title=htmlspecialchars(strip_tags($this->title));
	  $this->image=htmlspecialchars(strip_tags($this->image));
	  $this->content=htmlspecialchars(strip_tags($this->content));
	  $this->description=htmlspecialchars(strip_tags($this->description));
	  $this->published=htmlspecialchars(strip_tags($this->published));
	  $this->slug=htmlspecialchars(strip_tags($this->slug));
	  $this->tags=htmlspecialchars(strip_tags($this->tags));
	  // bind the values
	  $stmt->bindParam(':user_id', $this->user_id);
	  $stmt->bindParam(':title', $this->title);
	  $stmt->bindParam(':image', $this->image);
	  $stmt->bindParam(':content', $this->content);
	  $stmt->bindParam(':description', $this->description);
	  $stmt->bindParam(':published', $this->published);
	  $stmt->bindParam(':slug', $this->slug);
	  $stmt->bindParam(':tags', $this->tags);
	  if ($this->check()) {
	  	if($stmt->execute()){
		    return true;
		  }else{
		    $this->showError($stmt);
		    return false;
		  }
	  }
	}
	// update giveaway user record
	function update(){
	  // insert query
	  $query = "UPDATE " . $this->table_name . " SET title = :title, image = :image, content = :content, description = :description, published = :published, slug = :slug, tags = :tags WHERE id = :id";
	  $stmt = $this->conn->prepare($query);
	  $this->id=htmlspecialchars(strip_tags($this->id));
	  $this->title=htmlspecialchars(strip_tags($this->title));
	  $this->image=htmlspecialchars(strip_tags($this->image));
	  $this->content=htmlspecialchars(strip_tags($this->content));
	  $this->description=htmlspecialchars(strip_tags($this->description));
	  $this->published=htmlspecialchars(strip_tags($this->published));
	  $this->slug=htmlspecialchars(strip_tags($this->slug));
	  $this->tags=htmlspecialchars(strip_tags($this->tags));
	  $stmt->bindParam(':id', $this->id);
	  $stmt->bindParam(':title', $this->title);
	  $stmt->bindParam(':image', $this->image);
	  $stmt->bindParam(':content', $this->content);
	  $stmt->bindParam(':description', $this->description);
	  $stmt->bindParam(':published', $this->published);
	  $stmt->bindParam(':slug', $this->slug);
	  $stmt->bindParam(':tags', $this->tags);
	  if($stmt->execute()){
	    return true;
	  }else{
	    return false;
	  }
	}
  // read all message records
	function readAll($from_record_num, $records_per_page){
	  // query to read all message records, with limit clause for pagination
	  $query = "SELECT * FROM " . $this->table_name . " WHERE published=1 ORDER BY id DESC LIMIT ?, ?";
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
  // read all message records
	function readAllByTopicId($from_record_num, $records_per_page, $topic_id){
	  // query to read all message records, with limit clause for pagination
	  $query = "SELECT * FROM " . $this->table_name . " ps WHERE ps.published=1 and ps.id IN (SELECT pt.post_id FROM post_topic pt WHERE pt.topic_id=? GROUP BY pt.post_id HAVING COUNT(1)=1) ORDER BY id DESC LIMIT ?, ?";
	  // prepare query statement
	  $stmt = $this->conn->prepare( $query );
	  // bind limit clause variables
	  $stmt->bindParam(1, $topic_id);
	  $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
	  $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
	  // execute query
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
		$this->user_id = $row['user_id'];
		$this->title = $row['title'];
		$this->image = $row['image'];
		$this->content = $row['content'];
		$this->description = $row['description'];
		$this->published = $row['published'];
		$this->slug = $row['slug'];
		$this->tags = $row['tags'];
		$this->views = $row['views'];
		$this->liked = $row['liked'];
		$this->shared = $row['shared'];
		$this->created = $row['created'];
		$this->modified = $row['modified'];
	}
	function readBySlug(){
	  // query to select single record
	  $query = "SELECT id FROM " . $this->table_name . " WHERE slug = ? LIMIT 0,1";
	  // prepare query statement
	  $stmt = $this->conn->prepare( $query );
	  // sanitize
	  $this->slug=htmlspecialchars(strip_tags($this->slug));
	  // bind product id value
	  $stmt->bindParam(1, $this->slug);
	  // execute query
	  $stmt->execute();
	  // get row values
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  // assign retrieved row value to object properties
		$this->id = $row['id'];
	}
	function publisher(){
		$query = "UPDATE " . $this->table_name . " SET published = :published WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		// posted values
		$this->published=htmlspecialchars(strip_tags($this->published));
		$this->id=htmlspecialchars(strip_tags($this->id));
		// bind parameters
		$stmt->bindParam(':published', $this->published);
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