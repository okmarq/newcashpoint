<?php
// 500 calls max an hour
// 20 articles
// news API url
/*$business_url="http://newsapi.org/v2/top-headlines?country=ng&source=business&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $business_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$entertainment_url="http://newsapi.org/v2/top-headlines?country=ng&source=entertainment&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $entertainment_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$health_url="http://newsapi.org/v2/top-headlines?country=ng&source=health&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $health_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$science_url="http://newsapi.org/v2/top-headlines?country=ng&source=science&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $science_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$sport_url="http://newsapi.org/v2/top-headlines?country=ng&source=sports&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $sport_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$technology_url="http://newsapi.org/v2/top-headlines?country=ng&source=technology&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $technology_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$bitcoin_url="http://newsapi.org/v2/everything?q=bitcoin&from=2020-05-16&sortBy=publishedAt&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $bitcoin_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$business_us_url="http://newsapi.org/v2/top-headlines?country=us&source=business&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $business_us_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$apple_url="http://newsapi.org/v2/everything?q=apple&from=2020-06-15&to=2020-06-15&sortBy=popularity&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $apple_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$techcrunch_url="http://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $techcrunch_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$wallstreet_url="http://newsapi.org/v2/everything?domains=wsj.com&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $wallstreet_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);
*/
/*
$nigerian_url="http://newsapi.org/v2/top-headlines?country=ng&apiKey=9eb2de497dba47d09843655d6811698a";
$ch = curl_init();
$options = [
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_URL            => $nigerian_url
];
curl_setopt_array($ch, $options);
$data = json_decode(curl_exec($ch));
curl_close($ch);

$source = $data->articles[$i]->source->name;
$title = $data->articles[$i]->title;
$image = $data->articles[$i]->urlToImage;
$publishedAt = $data->articles[$i]->publishedAt;
$author = $data->articles[$i]->author;
$description = $data->articles[$i]->description;
$content = $data->articles[$i]->content;
*/
/*
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
	//print_r($news);
	$prep = array();
	foreach($news as $k => $v ) {
	  $prep[':'.$k] = $v;
	}
}
*/
?>