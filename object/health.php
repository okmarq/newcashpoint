<?php
class HealthNews{
	// database connection and table name
  private $conn;
  private $table_name = "health_news";
  // object properties
  public $id;
  public $source;
	public $title;
	public $image;
	public $publishedAt;
	public $author;
	public $description;
	public $content;
  public function __construct($db){
    $this->conn = $db;
  }
	function putNews(){
		$health_url="http://newsapi.org/v2/top-headlines?country=ng&category=health&apiKey=9eb2de497dba47d09843655d6811698a";
		$ch = curl_init();
		$options = [
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_URL            => $health_url
		];
		curl_setopt_array($ch, $options);
		$data = json_decode(curl_exec($ch));
		curl_close($ch);
		for ($i=0; $i < 20; $i++) {
			$news = array(
				'source' => $data->articles[$i]->source->name,
				'title'=>$data->articles[$i]->title,
				'image'=>$data->articles[$i]->urlToImage,
				'publishedAt'=>$data->articles[$i]->publishedAt,
				'author'=>$data->articles[$i]->author,
				'description'=>$data->articles[$i]->description,
				'content'=>$data->articles[$i]->content
			);
			$prep = array();
			foreach($news as $k => $v ) {
			  $prep[':'.$k] = $v;
			}
			$sth = $this->conn->prepare("INSERT INTO health_news ( " . implode(', ',array_keys($news)) . ") VALUES (" . implode(', ',array_keys($prep)) . ")");
			$res = $sth->execute($prep);
			if ($res) {
				//return true;
			} else {
				//return false;
			}
		}
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
	  $this->source = $row['source'];
	  $this->title = $row['title'];
	  $this->image = $row['image'];
	  $this->publishedAt = $row['publishedAt'];
	  $this->author = $row['author'];
	  $this->description = $row['description'];
	  $this->content = $row['content'];
	}
  // read all user records
	function readAll($from_record_num, $records_per_page){
	  // query to read all user records, with limit clause for pagination
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
}
?>