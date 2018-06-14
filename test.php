  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
    $country = "us";
    $category = "business";
    $apikey = "3c9ab2dff00242aeb669cce2ae6f07c5";
    $url = "https://newsapi.org/v2/top-headlines?country=". $country ."&category=".$category . "&apiKey=".$apikey;
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    $resp = curl_exec($ch);
   // print_r($resp); 
    curl_close($ch);

    $json = json_decode($resp);

 foreach($json->articles as $obj){
   $name = $obj->source->name;
   $author = $obj->author;
   $title = $obj->title;
   $description = $obj->description;
   $url = $obj->url;
   $imageURL = $obj->urlToImage;
   $datePublished = $obj->publishedAt;
 
   $time = strtotime($datePublished.' UTC');
   date_default_timezone_set("Africa/Lagos");
   $post_date = date("l, M d, Y", $time);
   $post_time = date("h:i a", $time);

   echo "<div class='container'>";
   echo "<a href='$url'  target='_blank'>
   <div class='row'>
        <div class='col-sm-4'>
            <img src='$imageURL' width='300px' height='150px'>
        </div>
        <div class='col-sm-8'>
            <h3> $title </h3>$description <BR> <span class='badge'>$post_date at $post_time</span>
        </div>
   </div>
   </a>";
   echo "<hr>";
   echo "</div>";
}
?>