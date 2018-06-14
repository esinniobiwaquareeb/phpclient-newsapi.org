<?php
    //Insert country code here
    $country = "us";
    
    //Insert news category here
    $category = "business";
    
    //Insert your api key here, if you dont have get one from newsapi.org
    $apikey = "";
    
    $url = "https://newsapi.org/v2/top-headlines?country=". $country ."&category=".$category . "&apiKey=".$apikey;
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    $resp = curl_exec($ch);
    print_r($resp); 
    curl_close($ch);
    
    
    //Check test.php to see how you can format your response
    ?>
